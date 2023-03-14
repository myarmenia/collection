<?php
require "../../config/con1.php";
$mounth = $_POST['mounth'];
$year = $_POST['year'];
$year1 = $year;
$mounth_number = date('n');
$this_day = date('d');

$array = [];

$mounths = array(
    1 => "January",
    2 => "February",
    3 => "March",
    4 => "April",
    5 => "May",
    6 => "June",
    7 => "Juny",
    8 => "August",
    9 => "September",
    10 => "October",
    11 => "November",
    12 => "December"
);

$mounth++;
$last_mounth = $mounth - 1;

if($mounth == 13) {
    $mounth = 1;
    $year++;
}

if($last_mounth == 13) {
    $last_mounth = 1;
    $year1 ++;
}

$select_mounth = $mounths[$mounth];

$first_day = date('w', strtotime("$select_mounth $year"));

if($first_day == 0 ) {
    $first_day = 7;
}

$last_day_prew_mounth = cal_days_in_month(CAL_GREGORIAN, $last_mounth, $year1);

if($first_day > 2 ) {
    $last_day_prew_mounth -= $first_day - 2;
}


$q = 1;
$f = 1;
$p='';
$num_of_days = cal_days_in_month(CAL_GREGORIAN, $mounth, $year);
$k=($first_day*1 + $num_of_days*1 - 1) / 7;

$mounth_name = $mounths[$mounth];


$days_number = 1;
$pasive_days = 1;


for ($i = 0; $i < 6; $i++) {
    $table  .= '<tr>';
    for ($j = 0; $j < 7; $j++){

        if($this_day == $days_number && $mounth == $mounth_number) {
            $active_day = "this_day";
        }else {
            $active_day = "";
        }

        if($i==0){
            if($j >= $first_day-1) {
                $dates = str_pad($days_number,2,'0', STR_PAD_LEFT);
                $table .= "<td class='" . $active_day . "'>".$dates."</td>";
                $days_number++;
            }
            else {
                $table .= "<td class='passive'>" . $last_day_prew_mounth . "</td>";
                $last_day_prew_mounth ++;
            }
        }
        else{
            if($days_number<=$num_of_days) {
                $dates = str_pad($days_number,2,'0', STR_PAD_LEFT);
                $table .= "<td class='" . $active_day . "'>".$dates."</td>";
            }else {
                $dates1 = str_pad($pasive_days,2,'0', STR_PAD_LEFT);
                $table .= "<td class='passive'>" . $dates1 . "</td>";
                $pasive_days++;
            }
            $days_number++;
        }
    }
    $table .="</tr>";
}
$array['year'] = $year;
$array['mounth'] = $mounths[$mounth];
$array["mounth_number"] = $mounth;
$array["table"] = $table;

echo json_encode($array)
?>