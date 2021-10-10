<?php 
    $remote_ip = $_SERVER['REMOTE_ADDR'];
    $path = "http://ip-api.com/xml/109.227.106.117";
    $xml = simplexml_load_file($path);

    $s = "";

    foreach($xml as $key => $value){
        $s.= $key ."--". $value . "\n";
    }
    
    echo $remote_ip;
?>