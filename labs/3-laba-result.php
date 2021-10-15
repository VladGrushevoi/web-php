<html>

<head>
    <title>PHP Test</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/2_laba.css">
</head>

<body>
    <?php
    // $choose = $_POST["course"];
    // echo $choose . "<a href='3-laba.php'> Назад до вибору</a>";
    // $correct_choose = strtolower(str_replace(" ", '', $choose));
    // $correct_choose = strtolower($choose);
    // $file = fopen("../data/data.txt", "rb");
    // $data = [];

    // while (!feof($file)) {
    //         $name_napr = strtolower(fgets($file));
    //         if(strcmp($name_napr, $correct_choose) == 0){
    //             $count_napr = intval(fgets($file));
    //             $index = 1;
    //             while($count_napr != $index){
    //                 $avg_ball = doubleval(fgets($file));
    //                 $count_free = intval(fgets($file));
    //                 $nedobor = "-";
    //                 $count_contr = intval(fgets($file));
    //                 $correct_contr = $count_contr <= 0 ? "-" : $count_contr;
    //                 $name_university = fgets($file);

    //                 $object = array(
    //                     'index' => $index,
    //                     'count_free' => $count_free,
    //                     'avg_ball' => $avg_ball,
    //                     'nedobor' => $nedobor,
    //                     'correct_contr' => $correct_contr,
    //                     'name_university' => $name_university
    //                 );
    //                 array_push($data, $object);
    //                 $index++;
    //             }
    //         }
    //     }


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
    
    // fclose($file);
    // $_POST['data'] = $data;
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
        $file = fopen("../data/data.txt", 'rb');
        $specialty = $_POST["course"];
    
        while (!feof($file)) {
            $string = trim(fgets($file));
            if (strcasecmp($string, trim($specialty)) == 0) {
                $rowNumber = 1;
                $university_count = (int)fgets($file);
                while (!feof($file) && $rowNumber <= $university_count) {
                    $average_grade = fgets($file);
                    $free_education_students_count = fgets($file);
                    $pay_education_students_count = fgets($file);
                    $university_name = fgets($file);
                    $correct_contr = intval($pay_education_students_count) <= 0 ? '-': intval($pay_education_students_count);
                    echo "<tr>
                            <td>$rowNumber</td>
                            <td>$average_grade</td>
                            <td>$free_education_students_count</td>
                            <td>-</td>
                            <td>$correct_contr</td>
                            <td>$university_name</td>
                          </tr>";
                    ++$rowNumber;
                }
                break;
            }
        }
        fclose($file);
        ?>
    </table>
</body>

</html>