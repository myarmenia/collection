<?php
require "../../config/con1.php";
$mounth = $_POST['mounth'];
$year = $_POST['year'];
$year1 = $year;

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
// $k=($first_day*1 + $num_of_days*1 - 1) / 7;

$mounth_name = $mounths[$mounth];

$from_date = date("Y/m/d", strtotime("$mounth_name $year"));
$to_date = date("Y/m/d", strtotime("+1 MONTH - 1 DAY", strtotime($from_date)));


for ($i = 0; $i < 6; $i++) {
    $p .= '<tr>';
    for ($j = 0; $j < 7; $j++){
        $h5 = '';
        $c = 0;
        $q = str_pad($q,2,'0', STR_PAD_LEFT);
        $divs = '';
        $select_date = "SELECT DAY(collections.release_date) as dd1, collections.sport_type, sports_type.sport_logo, sports_type.background FROM collections, sports_type where collections.sport_type = sports_type.sport_logo AND release_date BETWEEN  '$from_date' AND '$to_date'";
        $date_query = mysqli_query($con, $select_date);
        $count_p = mysqli_num_rows($date_query);

        while($date_row = mysqli_fetch_assoc($date_query)) {

            $k1 = str_pad($date_row['dd1'],2,'0', STR_PAD_LEFT);
            if($k1 == $q && $c < 3) {
                $c++;
                $divs .= "<div style='background: " . $date_row['background'] . "' class='mounth_releses'>
                            <img src='admin/sport_icons/" . $date_row['sport_logo'] . ".png' >
                        </div>";
            }
        }

        if($i==0){
            if($j >= $first_day-1) {
                $p .= "<td class='f_first_inside'  valign='top'>
                            <div class='box_cube'>
                                <div class='cube'>
                                    <div> <div class='number_day'>".$q."</div></div>"
                                        . $h5 .
                                "</div>
                            </div>"
                            . $divs .
                        "</td>";
                $q++;
            }
            else {
                $p .= "<td class='passive_sec f_first_inside'  valign='top'><div class='cube'> <div class='number_day'>" . $last_day_prew_mounth . "</div></div>
                </td>";
                $last_day_prew_mounth++;
            }
        }
        else{
            if($q<=$num_of_days) {
                $p .= "<td class='f_first_inside'  valign='top'>
                            <div class='box_cube'>
                                <div class='cube'>
                                    <div><div class='number_day'>".$q."</div></div>"
                                    . $h5 .
                                "</div>
                            </div>"
                            . $divs .
                        "</td>";
            }else {
                $p .= "<td class='passive_sec f_first_inside'  valign='top'><div class='cube'><div class='number_day'>" . $f . "</div></div>
                </td>";
                $f++;
            }
            $q++;
        }
    }
    $p .="</tr>";
}
$array['year'] = $year;
$array['mounth'] = $mounths[$mounth];
$array["mounth_number"] = $mounth;
$array["table"] = $p;

echo json_encode($array)
?>