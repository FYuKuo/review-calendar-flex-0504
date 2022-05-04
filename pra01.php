<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP月曆複習-0504</title>
    <style>
        * {
            box-sizing: border-box;
        }
        .table {
            display: flex;
            flex-wrap: wrap;
            width: 700px;
            /* height: 700px; */
            align-content: flex-start;
            text-align: center;
            margin: 10px auto;
            background-color: #E9DBFF;
            border-radius: 25px;

        }

        .table>div {
            width: 100px;
            height: 100px;
            /* border: 1px solid lightgrey; */
            line-height: 100px;

        }

        .table>.headerMonth {
            width: 100%;
            height: 80px;
            line-height: 80px;
            font-weight: bold;
            font-size: 20px;
        }

        .table>.header {
            width: 100px;
            height: 50px;
            /* border: 1px solid lightgrey; */
            line-height: 50px;
            font-weight: bold;
        }

        .today {
            color: red;
            text-decoration: underline;
            text-underline-offset: 5px;
        }
    </style>
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

    $allDay=[]; //空陣列(準備放入所有天數)

    //將月份前的空白日期放入陣列
    for($i=0 ; $i<$firstDayWeek ; $i++){
        $allDay[]="";
    }
    
    for($i=0; $i<$monthDay ; $i++){
        $date=date('Y-m-d',strtotime("+$i days",$firstDaySecond));
        $allDay[]=$date;
    }
    
    //將月份後的空白日期放入陣列
    for($i=0 ; $i<6-$lastDayWeek ; $i++){
        $allDay[]="";
    }

    echo "<pre>";
    print_r($allDay);
    echo "</pre>";

    echo "<hr>";

    echo "<div class='table'>";

    echo "<div class='headerMonth'>$monthFont</div>";

    echo "<div class='header'>SUN</div>";
    echo "<div class='header'>MON</div>";
    echo "<div class='header'>TUE</div>";
    echo "<div class='header'>WED</div>";
    echo "<div class='header'>THU</div>";
    echo "<div class='header'>FRI</div>";
    echo "<div class='header'>SAT</div>";


    //利用陣列的迴圈將陣列包在div裡面印出
    foreach($allDay as $day){
        $checktoday="";
        $today=date("Y-m-d");

        if($day == $today){
            $checktoday='today';
        }


        //判斷變數內是否有空白 如果沒有空白就把日期格式改為只有日的 有空白就只印出div
        if(!empty($day)){
            $dayFont=date('d',strtotime($day));
            echo "<div class='$checktoday'>{$dayFont}</div>";

        }else{
            echo "<div></div>";
        }
    }

    echo "</div>";
    ?>
</body>
</html>