<html>

<head>
    <title>PHP Test</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/2_laba.css">
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
<table class="">
    <tr>
        <th>Область</th>
        <th>Населення, тис</th>
        <th>Кількість ВНЗ</th>
        <th>Кількість ВНЗ на 100 тис населення</th>
    </tr>
    <?php
        $value = $_POST['value_region'];
        $region = $_POST["oblinfo"][$value - 1];
        $name = $region['name_region'];
        $people_count = $region['people_count'];
        $university_count = $region['university_count'];
        $people_per_university = $region['people_per_university'];
        echo    "<tr>
                    <td>
                        $name
                    </td>
                    <td>
                        $people_count
                    </td>
                    <td>
                        $university_count
                    </td>
                    <td>
                        $people_per_university
                    </td>
                </tr>";
    ?>
</table>
</body>

</html>