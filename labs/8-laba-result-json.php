<?php
    $ip = $_POST["ip"];
    $loc = file_get_contents("http://ip-api.com/json/$ip");
    $json = json_decode($loc, true);
    
    echo $json['country'];
?>