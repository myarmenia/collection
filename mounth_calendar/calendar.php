<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .mounth_control {
            width: 100%;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .mounth_control button {
            margin: 0px 10px;
        }

        .year {
            text-align: center;
        }

        .calendar {
            width: 100%;
            margin: 20px auto;
        }

        table {
            width: 50%;
            margin: 0px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid;
            padding: 10px;
            text-align: center;
        }

        .passive {
            background: #bbbbbb7d;
            opacity: .8;
            color: #888;
        }
    </style>

</head>

<?php
    $mounth_number = date('n');
    $mounth = date('F');
    $year = date('Y');
    // $day_number = date(" w");
    $first_day = date('w', strtotime('first day of this month'));
    
    if($first_day == 0 ) {
        $first_day = 7;
    }

    $last_day_prew_mounth = date('d', strtotime('last day of previous month'));

    $q = 1;
    $f = 1;
    $p='';
    $num_of_days = cal_days_in_month(CAL_GREGORIAN, $mounth_number, $year);
    $k=($first_day*1 + $num_of_days*1 - 1) / 7;
    for ($i = 0; $i < $k; $i++) {
        $p .= '<tr>';
        for ($j = 0; $j < 7; $j++){
            if($i==0){
                if($j >= $first_day-1) {

                    $dates = str_pad($q,2,'0', STR_PAD_LEFT);
                    $p .= "<td>".$dates."</td>";
                    $q++;
                }
                else {
                    $p .= "<td class='passive'>" . $last_day_prew_mounth . "</td>";
                    $last_day_prew_mounth --;
                }
            }
            else{
                if($q<=$num_of_days) {
                    $dates = str_pad($q,2,'0', STR_PAD_LEFT);
                    $p .= "<td>".$dates."</td>";
                }else {
                    $dates1 = str_pad($f,2,'0', STR_PAD_LEFT);
                    $p .= "<td class='passive'>" . $dates1 . "</td>";
                    $f++;
                }
                $q++;
            }
        }
        $p .="</tr>";
    }

?>

<body>
    <p class='year'><?= $year ?></p>
    <div class="mounth_control">
        <button class="before"><</button>
        <p class="mounth_text" data-mounth="<?= $mounth_number ?>"><?= $mounth ?></p>
        <button class="after">></button>
    </div>
    <div class="calendar">
        <table>
            <thead>
               <tr>
                    <th>MONDAY</th>
                    <th>TUESDAY</th>
                    <th>WEDNESDAY</th>
                    <th>THURSDAY</th>
                    <th>FRIDAY</th>
                    <th>SATURDAY</th>
                    <th>SUNDAY</th>
               </tr>
            </thead>
            <tbody>
                <?= $p ?>
            </tbody>
        </table>
    </div>

    <script>
           
        $(".before").click(function() {
            let mounth = $(".mounth_text").attr("data-mounth")
            let year = $(".year").html()

            $.ajax({
                'method': 'post',
                'url': "before.php",
                'data': {mounth, year},
                success: function(res) {
                    let result=JSON.parse(res)
                    $(".year").html(result.year)
                    $(".mounth_text").html(result.mounth)
                    $(".mounth_text").attr("data-mounth", result.mounth_number)
                    $("tbody").html(result.table)
                }
            })
        })


        $(".after").click(function() {
            let mounth = $(".mounth_text").attr("data-mounth")
            let year = $(".year").html()
            $.ajax({
                'method': 'post',
                'url': "after.php",
                'data': {mounth, year},
                success: function(res) {
                    let result=JSON.parse(res)
                    $(".year").html(result.year)
                    $(".mounth_text").html(result.mounth)
                    $(".mounth_text").attr("data-mounth", result.mounth_number)
                    $("tbody").html(result.table)
                }
            })
        })


    </script>

</body>
</html>