<?php
$days = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");

$k1 = "";
$k2 = 0;

$last_day_prew_mounth = date('d', strtotime('last day of this month'));

$year = date('Y');
$mounth_number = date('n');
$this_mounth = date('F');
$week_start = date('d', strtotime("monday this week"));
$week_end = date('d', strtotime("sunday this week"));

$table1 = "";
$trs = "";
$class = "";

$from_date = date("Y/m/d", strtotime("$week_start $this_mounth $year"));
$to_date = date("Y/m/d", strtotime("+1 Week - 1 DAY", strtotime($from_date)));

for($i = 0; $i < 7; $i++) {

    if($week_start > $last_day_prew_mounth) {
        $week_start = 1;
    }

    $week_start = str_pad($week_start,2,'0', STR_PAD_LEFT);

    $divs = "";
    $select_date = "SELECT DAY(collections.release_date) as dd1, MONTH(collections.release_date) as mm1, collections.sport_type, sports_type.sport_logo, sports_type.background FROM collections, sports_type where collections.sport_type = sports_type.sport_logo AND release_date BETWEEN  '$from_date' AND '$to_date'";
    $date_query = mysqli_query($con, $select_date);
    $count_p = mysqli_num_rows($date_query);
    while($date_row = mysqli_fetch_assoc($date_query)) {
        $k1 = str_pad($date_row['dd1'],2,'0', STR_PAD_LEFT);
        $k2 = $date_row['mm1'];
        if($k1 == $week_start && $k2 == $mounth_number) {
            $divs .= "<div style='background: " . $date_row['background'] . "' class='week_releses'>
                            <img src='../admin/sport_icons/" . $date_row['sport_logo'] . ".png' >
                        </div>";
        }
    }

    $table1 .= "<th class='days' data-day='" . $week_start . "'> 
                                    <span>" . $week_start . "</span>
                                    <span>" . $days[$i] . "</span>
                    </th>";


    if($i < 6) {
        $class = "border";
    }else {
        $class = "";
    }

    $trs .= "<div class='" . $class . "'>
               <p class='week_days'>
               <span>" . $week_start . "</span>
               <span>" . $days[$i] . "</span>
               </p>
                     " . $divs . "
            </div>";
    $week_start ++;
}



?>


<table class="calendar">
    <thead class="calendar_header">
    <?= $table1 ?>
    </thead>

    <tbody class="calendar_body">
    <tr class="empty">
        <td></td>
    </tr>


    </tbody>
</table>
<div class="fel">
    <?= $trs ?>
</div>
