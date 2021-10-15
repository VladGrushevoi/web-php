<html>

<head>
    <title>PHP Test</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/2_laba.css">
</head>

<body>
    <?php
    $choose = $_POST["course"];
    echo $choose . "<a href='3-laba.php'> Назад до вибору</a>";
    // $correct_choose = strtolower(str_replace(" ", '', $choose));
    $correct_choose = strtolower($choose);
    $file = fopen("../data/data.txt", "r");
    $data = [];

    while (!feof($file)) {
            $name_napr = strtolower(fgets($file));
            if($name_napr == $correct_choose){
                echo "<h1>ALOBLYAT</h1>";
                $count_napr = intval(fgets($file));
                $index = 1;
                while($count_napr != $index){
                    $avg_ball = doubleval(fgets($file));
                    $count_free = intval(fgets($file));
                    $nedobor = "-";
                    $count_contr = intval(fgets($file));
                    $correct_contr = $count_contr <= 0 ? "-" : $count_contr;
                    $name_university = fgets($file);

                    $object = array(
                        'index' => $index,
                        'count_free' => $count_free,
                        'avg_ball' => $avg_ball,
                        'nedobor' => $nedobor,
                        'correct_contr' => $correct_contr,
                        'name_university' => $name_university
                    );
                    array_push($data, $object);
                    $index++;
                }
            }
        }


        // if (strcmp($curr_line, $correct_choose) == 0) {
        //     $count_record = intval(fgets($file));
        //     $index = 1;
        //     while (!feof($file)) {
        //         if ($count_record == $index) {
        //             break;
        //         }
        //         $avg_ball = doubleval(fgets($file));
        //         $count_free = intval(fgets($file));
        //         $nedobor = "-";
        //         $count_contr = intval(fgets($file));
        //         $correct_contr = $count_contr <= 0 ? "-" : $count_contr;
        //         $name_university = fgets($file);

        //         $object = array(
        //             'index' => $index,
        //             'count_free' => $count_free,
        //             'avg_ball' => $avg_ball,
        //             'nedobor' => $nedobor,
        //             'correct_contr' => $correct_contr,
        //             'name_university' => $name_university
        //         );
        //         array_push($data, $object);
        //         $index++;
        //     }
        // }
    
    fclose($file);
    $_POST['data'] = $data;
    ?>

    <table>
        <tr>
            <th>N</th>
            <th>Середній бал поступивших на бюджет</th>
            <th>Кількість поступивших на бюджет</th>
            <th>Недобір</th>
            <th>Кількість контрактників</th>
            <th>ВНЗ</th>
        </tr>
        <?php
        foreach ($_POST['data'] as $value) {
            
            echo "<tr>
                <td>
                   ". $value['index'] ."
                </td>
                <td>
                ". $value['avg_ball'] ."
                </td>
                <td>
                ". $value['count_free'] ."
                </td>
                <td>
                ". $value['nedobor'] ."
                </td>
                <td>
                ". $value['correct_contr'] ."
                </td>
                <td>
                ". $value['name_university'] ."
                </td>
                </tr>";
        }
        ?>
    </table>
</body>

</html>