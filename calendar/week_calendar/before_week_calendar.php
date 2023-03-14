<?php
require "../../config/con1.php";
$last_day_of_week = $_POST["last_day_of_week"]-8;
$this_mounth = $_POST["this_mounth"];
$this_year = $_POST["this_year"];
$this_thursday_day = $_POST["this_thursday_day"];
$days = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
$ccc = 0;
$mounth_name = "";

$this_thursday_day -= 7;

$week_array = [];

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

if($this_mounth == 0) {
    $this_mounth = 12;
    $this_year--;
}

$prev_mounth = $this_mounth-1;
$prev_year = $this_year;


if($prev_mounth == 0) {
    $prev_mounth = 12;
    $prev_year--;
}

$mounth_name = $mounths[$this_mounth];

$num_of_days = cal_days_in_month(CAL_GREGORIAN, $prev_mounth, $this_year);

$last_day_prev_mounth = date('w', strtotime($prev_year . "-" . $prev_mounth . "-" . $num_of_days));

if($this_thursday_day < 1) {
    $this_mounth --;
    $this_thursday_day = $num_of_days;
}

$from_date = date("Y/m/d", strtotime("$last_day_of_week $mounth_name $this_year"));
$to_date = date("Y/m/d", strtotime("+1 Week - 1 DAY", strtotime($from_date)));

for($i = 0; $i < 7; $i++) {

    if($i == 4) {
        $this_thursday_day = $last_day_of_week;
    }


    if($this_thursday_day < 1) {
        $this_mounth --;
    }

    $last_day_of_week ++;

    if($last_day_of_week < 1 ) {
        $last_day_of_week = $num_of_days;
    }

    if($last_day_prev_mounth > 1 && $last_day_of_week == $num_of_days && $ccc == 0) {
        $last_day_of_week -= $last_day_prev_mounth-1;
        $ccc = 1;
    }

    if($last_day_of_week > $num_of_days) {
        $last_day_of_week = 1;
    }

    $last_day_of_week = str_pad($last_day_of_week,2,'0', STR_PAD_LEFT);

    $divs = "";
    $select_date = "SELECT DAY(collections.release_date) as dd1, MONTH(collections.release_date) as mm1, collections.sport_type, sports_type.sport_logo, sports_type.background FROM collections, sports_type where collections.sport_type = sports_type.sport_logo AND release_date BETWEEN  '$from_date' AND '$to_date'";
    $date_query = mysqli_query($con, $select_date);
    $count_p = mysqli_num_rows($date_query);
    while($date_row = mysqli_fetch_assoc($date_query)) {
        $k1 = str_pad($date_row['dd1'],2,'0', STR_PAD_LEFT);
        $k2 = $date_row['mm1'];

        if($k1 == $last_day_of_week && $k2 == $this_mounth) {
            $divs .= "<div style='background: " . $date_row['background'] . "' class='week_releses'>
                            <img src='../admin/sport_icons/" . $date_row['sport_logo'] . ".png' >
                        </div>";
        }
    }

    $table1 .= "<th class='days' data-day='" . $last_day_of_week . "'>
                     
                     <span>" . $last_day_of_week . "</span>
                     <span>" . $days[$i] . "</span>
                     
                </th>";

    if($i < 6) {
        $class = "border";
    }else {
        $class = "";
    }

    $trs1 .= "<div class='" . $class . "'>
        <p class='week_days'>
                     <span>" . $last_day_of_week . "</span>
                     <span>" . $days[$i] . "</span>
                     </p>
                       " . $divs . "
            </div>";;
}

$week_array["week_days"] = $table1;
$week_array["week_mounth"] = $mounths[$this_mounth];
$week_array["week_mounth_number"] = $this_mounth;
$week_array["this_thursday_day"] = $this_thursday_day;
$week_array["week_year"] = $this_year;
$week_array['trs'] = $trs1;


echo json_encode($week_array);

?>