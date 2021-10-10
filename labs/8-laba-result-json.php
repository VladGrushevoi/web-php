<?php
    $ip = $_POST["ip"];
    $loc = file_get_contents("https://ipapi.co/$ip/json/");
    $json = json_decode($loc, true);
    $s = "";
    foreach($json as $key => $value){
        $s.= $key . "--". $value ."\n";
    }
    echo $s;
?>