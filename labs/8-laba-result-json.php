<?php
    header("Content-Type: text/html");
    $ip = $_POST["ip"];
    $loc = file_get_contents("http://ip-api.com/json/$ip");
    $json = json_decode($loc, true);

    $html = "";
    $html .= "<p>Flag: <img src='../flags_ISO_3166-1/".$json['countryCode']."' alt='../flags_ISO_3166-1/_unitednations'></p>";
    foreach($json as $key => $value){
        $html .= "<p>". $key . ": ". $value ."</p>";
    }
    
    echo $html;
?>