<?php

require "../config/con1.php";
if(!empty($_POST['sport_id'])) {
    $sport_id = $_POST['sport_id'];
    $type = $_POST['type'];


    if($_POST["user_id"] != '') {
        $user_id = $_POST["user_id"];
    }else {
        $user_id = 0;
    }

    $select_sport = "SELECT * FROM sports_type WHERE id = $sport_id";
    $sport_query = mysqli_query($con, $select_sport);
    $sport_row = mysqli_fetch_assoc($sport_query);
    $sport_name = $sport_row["sport_type"];

    $dates= "SELECT d.id, d.data, fd.sport_id, fd.status FROM dates as d LEFT JOIN favorite_dates as fd ON d.id = fd.date_id AND fd.status = 1 AND fd.sport_id = $sport_id AND fd.type = '$type' AND user_id = $user_id GROUP BY d.id";
    $dates_querry=mysqli_query($con, $dates);
    $take_dates='';

    while ($dates_row = mysqli_fetch_assoc($dates_querry)) {
        if($dates_row["status"] == 1) {
            $color = "gold";
        } else {
            $color = "white";
        }
        if($type == 'release') {
            $take_dates.=
                '
                    <div class="box1"><a class="single_date" href="single_release.php?date=' . $dates_row['data'] . '&sport_type=' . $sport_id . '">'.$dates_row['data'].'</a><i class="star_o i-click fa fa-star" data-id='.$dates_row['id'].' style="color:' . $color . '"></i></div>
                ';
        }else {
            $take_dates.=
                '
                    <div class="box1"><a class="single_date" href="checklist.php?date=' . $dates_row['data'] . '&sport_type=' . $sport_id . '">'.$dates_row['data'].'</a><i class="star_o i-click fa fa-star" data-id='.$dates_row['id'].' style="color:' . $color . '"></i></div>
                ';
        }
    }


    echo $take_dates;
}
?>

