<?php

$gorod = $_GET["gorod"];

$path = "https://www.gismeteo.ua/ua/$gorod/";
$doc = new DOMDocument();
$internalErrors = libxml_use_internal_errors(true);
$doc->loadHTMLFile($path);
libxml_use_internal_errors($internalErrors);

$xpath = new DOMXpath($doc);
$temperature = $xpath->query("/html/body/section/div[2]/div/div[1]/div/div[2]/div[1]/div[2]/div/div[1]/div/div[3]/div/div/div/*/span[1]");
$times = $xpath->query("/html/body/section/div[2]/div/div[1]/div/div[2]/div[1]/div[2]/div/div[1]/div/div[1]/*/div/span");
$city_name = $xpath->query("//a[contains(@class, 'js-crumb crumb link gray')]");
header("Content-Type: image/png");

$im = @imagecreate(500, 200)
    or die("Невозможно создать поток изображения");


$black = imagecolorallocate($im, 0, 0, 0);
$blue = imagecolorallocate($im, 0, 0, 255);
$red = imagecolorallocate($im, 255, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);

// $font = "../Shrift/caviar-dreams";
$left_image_src = imagecreatefrompng("../images/left.png");
$center_image_src = imagecreatefrompng("../images/center.png");
$right_image_src = imagecreatefrompng("../images/right.png");
$moon_image_src = imagecreatefrompng("../images/moon_sm.png");
$sun_image_src = imagecreatefrompng("../images/sun_sm.png");
imagefilledrectangle($im, 0, 0, 499, 199, $black);


imagecopyresized($im, $left_image_src, 0, 0, 0, 0, 150, 150, 100, 100);
imagecopyresized($im, $right_image_src, 350, 0, 0, 0, 150, 150, 100, 100);
imagecopyresized($im, $center_image_src, 150, 0, 0, 0, 200, 150, 100, 100);
imagecopyresized($im, $sun_image_src, 250 - 25, 10, 0, 0, 50, 50, 64, 64);
imagecopyresized($im, $moon_image_src, 10, 10, 0, 0, 50, 50, 64, 64);
imagecopyresized($im, $moon_image_src,490 - 50, 10, 0, 0, 50, 50, 64, 64);

imageantialias($im, true);

imageline($im, 50, 150, 400, 150, $blue);

for($i = 0; $i < count($temperature) - 1; $i++){
    $curr_temperature = intval($temperature[$i]->nodeValue);
    $next_temperature = intval($temperature[$i + 1]->nodeValue);
    $curr_temperature_text = $curr_temperature >= 0? "+".$curr_temperature : "-".$curr_temperature;
    $next_temperature_text = $next_temperature >= 0? "+".$next_temperature : "-".$next_temperature;

    imageline($im, 50 * ($i+1), 110 - $curr_temperature * 2, 50 * ($i + 2), 110 - $next_temperature * 2, $red);
    imagestring($im, 4, 50*($i + 1) - 10, (110 - $curr_temperature * 2) - 20, $curr_temperature_text, $red);
    imagestring($im, 4, 50*($i + 2) - 10, (110 - $next_temperature * 2) - 20, $next_temperature_text, $red);

}

for($i = 0; $i < count($times); $i++ ){
    $time = intval($times[$i]->nodeValue) <= 9 ? "0".$times[$i]->nodeValue : $times[$i]->nodeValue;
    imageline($im, 50*($i + 1), 145, 50*($i + 1), 150, $blue);
    imagestring($im,4, (50*($i + 1)) - 7, 130,$time,$blue);
}
$name_city = $city_name[count($city_name) - 1]->nodeValue;
imagestring($im, 20, 120, 170, $name_city . date("d.m.y") , $blue);

imagepng($im);
imagedestroy($im);

?>