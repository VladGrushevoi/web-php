<html>

<head>
    <title>PHP Test</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/2_laba.css">
</head>

<body>
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
    $choose = $_POST["course"];
    echo $choose . "<a href='3-laba.php'> Назад до вибору</a>";
    $correct_choose = strtolower(str_replace(" ", '', $choose));

    $file = fopen("../data/data.txt", "r");

    while (!feof($file)) {
        $curr_line = strtolower(str_replace(" ", '', fgets($file)));
        if ($curr_line == $correct_choose) {
            $count_record = intval(fgets($file));
            $index = 1;
            while(!feof($file)){
            if($count_record == $index){
                break;
            }
            $avg_ball = doubleval(fgets($file));
            $count_free = intval(fgets($file));
            $nedobor = "-";
            $count_contr = intval(fgets($file));
            $correct_contr = $count_contr == 0 ? "-":$count_contr;
            $name_university = fgets($file);

            echo "<tr>
                <td>
                    $index
                </td>
                <td>
                $avg_ball
                </td>
                <td>
                    $count_free
                </td>
                <td>
                    $nedobor
                </td>
                <td>
                    $correct_contr
                </td>
                <td>
                    $name_university
                </td>
                </tr>";

                $index++;
            }
        }
    }
    ?>
    </table>
</body>

</html>