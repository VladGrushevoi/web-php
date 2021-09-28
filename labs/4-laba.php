<html>

<head>
    <title>PHP Test</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/4-laba.css">
</head>

<body>
    <?php
        $file = fopen("../data/oblinfo.txt", "r");
        $count_region = fgets($file);
        $index = 1;
        $oblinfo = [];
        while(!feof($file)){
            $name_region = fgets($file);
            $people_count = intval(fgets($file));
            $university_count = intval(fgets($file));
            $people_per_university = $people_count / $university_count;
            $info_region = array(
                                    'index' => $index,
                                    'name_region' => $name_region,
                                    'people_count' => $people_count,
                                    'university_count' => $university_count,
                                    'people_per_university' => $people_per_university
            );
            array_push($oblinfo, $info_region);
            $index++;
        }
        $_POST["oblinfo"] = $oblinfo;
    ?>
    <div class="container">
        <h3>Виберіть область</h3>
        <form method="POST" action="4-laba-result.php">
            <select name="value_region">
                <?php
                    foreach($_POST["oblinfo"] as $value){
                        $index = $value['index'];
                        $name = $value['name_region'];
                        echo "<option value=$index>$name</option>";
                    }
                ?>
            </select>
            <input type="submit">
        </form>
    </div>

</body>

</html>