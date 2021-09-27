<html>

<head>
    <title>PHP Test</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/3_laba.css">
</head>

<body>
    <form method="POST" action="3-laba-result.php">
        <?php
            $file = fopen("../data/napr.txt", "r");
            $courses = [];
            while(!feof($file)){
                $curr_napr = fgets($file);
                array_push($courses, $curr_napr);
            }
            fclose($file);
            sort($courses);
            foreach($courses as $curr_napr){
                echo "<input type='radio' name='course' value=\"$curr_napr\" >$curr_napr<br>";
            }
        ?>
        <input type="submit" value="Отправить">
    </form>
</body>

</body>

</html>