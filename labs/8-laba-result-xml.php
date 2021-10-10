<?php 
    $remote_ip = $_SERVER['REMOTE_ADDR'];
    $path = "https://ipapi.co/$remote_ip/xml";
    $xml = simplexml_load_file($path);
    
    echo $xml-> country_name;
?>