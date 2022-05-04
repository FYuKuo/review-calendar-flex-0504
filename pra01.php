<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP月曆複習-0504</title>
</head>
<body>
    <h1>PHP月曆複習-0504</h1>

    <?php

    $month=5; //月份
    $firstDay=date("Y-") . $month . "-1"; //第一天日期
    $firstDaySecond=strtotime($firstDay); //第一天轉秒
    $firstDayWeek=date('w',$firstDaySecond); //第一天星期幾
    $monthDay=date('t',$firstDaySecond); //月份有幾天
    $lastDay=date('Y-') . $month . "-" . $monthDay; //最後一天日期
    $lastDaySecond=strtotime($lastDay); //最後一天轉秒
    $lastDayWeek=date('w',$lastDaySecond); //最後一天星期幾
    $monthFont=date('M',$firstDaySecond); //月份英文

    echo "月份 ==>" . $month . "<br>";
    echo "第一天日期 ==>" . $firstDay . "<br>";
    echo "第一天轉秒 ==>" . $firstDaySecond . "<br>";
    echo "第一天星期幾 ==>" . $firstDayWeek . "<br>";
    echo "月份有幾天 ==>" . $monthDay . "<br>";
    echo "最後一天日期 ==>" . $lastDay . "<br>";
    echo "最後一天轉秒 ==>" . $lastDaySecond . "<br>";
    echo "最後一天星期幾 ==>" . $lastDayWeek . "<br>";
    echo "月份英文 ==>" . $monthFont . "<br>";

    echo "<hr>";



    ?>
</body>
</html>