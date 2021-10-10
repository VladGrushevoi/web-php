<?php 
    $remote_ip = $_SERVER['REMOTE_ADDR'];
    $path = "http://ip-api.com/xml/$remote_ip";
    $xml = simplexml_load_file($path);
    
    echo $xml-> country_name;
?>