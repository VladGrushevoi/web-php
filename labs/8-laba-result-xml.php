<?php 
    // $remote_ip = $_SERVER['REMOTE_ADDR'];
    $remote_ip = "109.227.106.117";
    $path = "http://ip-api.com/xml/$remote_ip";
    $xml = simplexml_load_file($path);

    $html = "<p>Flag: <img src='../flags_ISO_3166-1/".strtolower($xml->countryCode).".png' alt='../flags_ISO_3166-1/_unitednations.png'></p>";

    foreach($xml as $key => $value){
        $html .= "<p>". $key . ": ". $value ."</p>";
    }
    
    echo $html;
?>