<?php

if(isset($_GET['mounth'])) {
    $mounth = $_GET['mounth'];
    $year = $_GET['year'];
    $mounth_number = $_GET['mounth_number'];
    $last_mounth_number = $mounth_number - 1;

    if($last_mounth_number == 0) {
        $last_mounth_number = 12;
    }

    $last_day_prew_mounth = cal_days_in_month(CAL_GREGORIAN, $last_mounth_number, $year);
    $first_day = date('w', strtotime("$mounth $year"));
}else {
    $mounth = date('F');
    $year = date('Y');
    $first_day = date('w', strtotime('first day of this month'));
    $last_day_prew_mounth = date('d', strtotime('last day of previous month'));
    $mounth_number = date('n');

}


$from_date = date("Y/m/d", strtotime("$mounth $year"));
$to_date = date("Y/m/d", strtotime("+1 MONTH - 1 DAY", strtotime($from_date)));
//$select_date = "SELECT DAY(collections.release_date) as dd1, collections.sport_type, sports_type.sport_logo, sports_type.background FROM collections, sports_type where collections.sport_type = sports_type.sport_logo AND release_date BETWEEN  '$from_date' AND '$to_date'";
//$date_query = mysqli_query($con, $select_date);
//$count_p = mysqli_num_rows($date_query);

$k1 = "";

if($first_day == 0 ) {
    $first_day = 7;
}

if($first_day > 2 ) {
    $last_day_prew_mounth -= $first_day - 2;
}

$q = 1;
$f = 1;
$p='';

$num_of_days = cal_days_in_month(CAL_GREGORIAN, $mounth_number, $year);

for ($i = 0; $i < 6; $i++) {

    $p .= '<tr class="f_first">';
    for ($j = 0; $j < 7; $j++){
        $h5 = '';
        $c = 0;
        $dates = str_pad($q,2,'0', STR_PAD_LEFT);
        $divs = '';
        $select_date = "SELECT DAY(collections.release_date) as dd1, collections.sport_type, sports_type.sport_logo, sports_type.background FROM collections, sports_type where collections.sport_type = sports_type.sport_logo AND release_date BETWEEN  '$from_date' AND '$to_date'";
        $date_query = mysqli_query($con, $select_date);
        $count_p = mysqli_num_rows($date_query);


        while($date_row = mysqli_fetch_assoc($date_query)) {

            $k1 = str_pad($date_row['dd1'],2,'0', STR_PAD_LEFT);
            if($k1 == $dates && $c < 3) {
                $c++;
                $divs .= "<div style='background: " . $date_row['background'] . "' class='mounth_releses'>
                            <img src='admin/sport_icons/" . $date_row['sport_logo'] . ".png' >
                        </div>";

            }
        }

        if($c > 2) {
            $h5 = "<div class='h5 select_day' >...</div>";
        }else {
            $h5 = "";
        }

        if($i==0){
            if($j >= $first_day-1) {
                $p .= "<td class='f_first_inside'  valign='top'>
                            <div class='box_cube'>
                                <div class='cube'>
                                    <div class='number_day'>".$dates."</div>"
                                    . $h5 .
                                "</div>
                            </div>"
                    . $divs .
                    "</td>";
                $q++;
            }
            else {
                $p .= "<td class='passive_sec'  valign='top'><div class='cube'> <div class='number_day'>" . $last_day_prew_mounth . "</div></div></td>";
                $last_day_prew_mounth ++;
            }
        }
        else{
            if($q<=$num_of_days) {
                $p .= "<td class='f_first_inside' valign='top'>
                            <div class='box_cube'>
                                <div class='cube'>
                                    <div class='number_day'>".$dates."</div>"
                                    . $h5 .
                                "</div>
                            </div>"
                    . $divs .
                    "</td>";
            }else {
                $dates1 = str_pad($f,2,'0', STR_PAD_LEFT);
                $p .= "<td class='passive_sec f_first_inside'  valign='top'><div class='cube'><div class='number_day'>" . $dates1 . "</div></div>
                </td>";
                $f++;
            }
            $q++;
        }
    }
    $p .="</tr>";
}
?>
<table class="calendar">
    <thead class="empty">
    <th>MON</th>
    <th>TUE</th>
    <th>WED</th>
    <th>THU</th>
    <th>FRI</th>
    <th>SAT</th>
    <th>SUN</th>
    </thead>
    <tbody class="calendar_body">
    <tr>
        <?= $p ?>
    </tr>
    </tbody>
</table>