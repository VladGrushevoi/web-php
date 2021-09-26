<html>

<head>
    <title>PHP Test</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/2_laba.css">
</head>

<body>
    <table class="">
    <tr>
        <th>N</th>
        <th>Область</th>
        <th>Населення, тис</th>
        <th>Кількість ВНЗ</th>
        <th>Кількість ВНЗ на 100 тис населення</th>
    </tr>
        <?php
            $handle = fopen("../data/oblinfo.txt", "r");
            $index = 1;
            $count_region = intval(fgets($handle));
            while($handle){
                if($index > $count_region){
                    break;
                }
                $name_region = fgets($handle);
                $people_count = intval(fgets($handle));
                $university_count = intval(fgets($handle));
                $people_per_University = round($people_count / $university_count, 2);
                #echo "index " . $index . "name" . $name_region . " people count" . $people_count . " university count" . $university_count . " PpU $people_per_University <br>" ;
                echo "<tr>
                        <td>
                            $index
                        </td>
                        <td>
                            $name_region
                        </td>
                        <td>
                            $people_count
                        </td>
                        <td>
                            $university_count
                        </td>
                        <td>
                            $people_per_University
                        </td>
                    </tr>";
                    $index += 1;
            }
            fclose($handle);
        ?>
    </table>
</body>

</html>