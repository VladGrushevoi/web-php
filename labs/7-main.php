<?php
    header("Content-type: text/xml; charset=utf-8");
    $value = $_GET['value'];
    $query = "https://dmarket.dp.ua/?subcats=Y&pcode_from_q=Y&pshort=Y&pfull=Y&pname=Y&pkeywords=Y&search_performed=Y&cid=0&q=" . $value . "&dispatch=products.search";
    $doc = new DOMDocument();
    $internalErrors = libxml_use_internal_errors(true);
    $doc->loadHTMLFile($query);
    libxml_use_internal_errors($internalErrors);

    $xpath = new DOMXpath($doc);

    $images = $xpath->evaluate("//img[contains(@width, '213')]");
    $info = $xpath->evaluate("//a[contains(@class,'product-title')]");
    $prices = $xpath->query("//span[contains(@class, 'ty-price-num')]");
    $s = "";
    for($i = 0; $i < count($images); $i++){
        $correct_price = "";
        for($j = 0; $j < count($prices[$i] -> childNodes); $j++){
            $correct_price .= $prices[$i*2] -> childNodes[$j] -> nodeValue . "грн" ;
        }

        //$s .= $images[$i] -> getAttribute("data-src") . " -- ". $info[$i] -> getAttribute('title') . " -- " . $correct_price ."\n";
        $s .= "<div class='card'>
                <img src=" . $images[$i] -> getAttribute("data-src") . ">
                <p>". $info[$i] -> getAttribute('title') ."</p>
                <p>". $correct_price ."</p>
                </div>";
    }
    echo $s;
?>