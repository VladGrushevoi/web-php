<html>

<head>
    <title>PHP Test</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/5-laba.css">
</head>

<body>
    <?php
    $path = "https://www.gismeteo.ua/ua/weather-cherkasy-4956/";
    $doc = new DOMDocument();
    $internalErrors = libxml_use_internal_errors(true);
    $doc->loadHTMLFile($path);
    libxml_use_internal_errors($internalErrors);

    $xpath = new DOMXpath($doc);
    $sun_cycle = $xpath->query("//*[contains(@class, 'id_item')]");
    $temperature = $xpath->query("/html/body/section/div[2]/div/div[1]/div/div[2]/div[1]/div[2]/div/div[1]/div/div[3]/div/div/div/*/span[1]");
    $times = $xpath->query("/html/body/section/div[2]/div/div[1]/div/div[2]/div[1]/div[2]/div/div[1]/div/div[1]/*/div/span");
    $city_name = $xpath->query("//a[contains(@class, 'js-crumb')]");
    ?>
    <div class="container">
        <h2><?php echo $city_name[2]->nodeValue?></h2>
        <h3>Температура впродовж дня</h3>
        <div class="wraper">
            <?php
                foreach($times as $index => $time){
                    echo "<div class='item'>
                            <h4>
                                ". $time->nodeValue ." г
                            </h4>
                            <h4>
                                " .$temperature[$index]->nodeValue . "&deg;
                            </h4>
                        </div>";
                }
            ?>
        </div>
        <div class="wraper">
                <div class="cycle">
                <h3>Цикл сонячного дня</h3>
                    <?php
                            echo "<p>
                                    ".$sun_cycle[0]->nodeValue."
                                </p>
                                <p>
                                    ".$sun_cycle[1]->nodeValue."
                                </p>
                                <p>
                                    ". $sun_cycle[2]->nodeValue ."
                                </p>
                                ";
                    ?>
                </div>
                <div class="cycle">
                <h3>Цикл місячної ночі</h3>
                    <?php
                            echo "<p>
                                    ".$sun_cycle[3]->nodeValue."
                                </p>
                                <p>
                                    ".$sun_cycle[4]->nodeValue."
                                </p>
                                <p>
                                    ". $sun_cycle[5]->nodeValue ."
                                </p>
                                ";
                    ?>
                </div>

        </div>
    </div>
</body>

</html>