<?php
require "config/con1.php";

if(!empty($_POST['action'])){
    $date_id=$_POST['date_id'];
    $sport_id=$_POST['sport_id'];
    $favorite_type=$_POST['favorite_type'];
    $user_id = $_POST['user_id'];
    $parents_type = $_POST['parents_type'];
    $release_data = "";
    $checklist_data = "";

    $favorite_release_arr = [];
    $favorite_checklist_arr = [];

    $select_date = "SELECT data from dates WHERE id = $date_id";
    $data_query = mysqli_query($con, $select_date);
    $date_row = mysqli_fetch_assoc($data_query);

    $data = $date_row['data'];

    $from_data = explode("-", $data)[0];
    $to_data = explode("-", $data)[1];

    if($_POST['action'] == 'add') {

        $select_sport = "SELECT sport_type from `sports_type` WHERE id = $sport_id";
        $sport_query = mysqli_query($con, $select_sport);
        $sport_row = mysqli_fetch_assoc($sport_query);

        $sport_name = $sport_row['sport_type'];

       if($parents_type == "release") {
           $select_releases = "SELECT id From collections Where sport_type = '$sport_name' AND `year_of_releases` BETWEEN $from_data AND $to_data ";
           $release_query = mysqli_query($con, $select_releases);

           while($release_row = mysqli_fetch_assoc($release_query)) {
               array_push($favorite_release_arr, $release_row["id"]);
           }

           for($i = 0; $i < count($favorite_release_arr); $i++) {
               $release_data = $favorite_release_arr[$i];
               $insert_all_releases = "INSERT INTO `favorite_release`(`release_id`, `user_id`, `date`) VALUES ($release_data, $user_id, '$data')";
               $query_all_releases = mysqli_query($con, $insert_all_releases);
           }
       }else {
           $select_releases = "SELECT id From collections Where sport_type = '$sport_name' AND `year_of_releases` BETWEEN $from_data AND $to_data ";
           $release_query = mysqli_query($con, $select_releases);

           while($release_row = mysqli_fetch_assoc($release_query)) {
               array_push($favorite_release_arr, $release_row["id"]);
           }

//
           for($i = 0; $i < count($favorite_release_arr); $i++) {
               $release_data = $favorite_release_arr[$i];
               $selet_base_checklist = "SELECT id FROM base_checklist WHERE `realese_id`= $release_data";
               $base_checklist_query = mysqli_query($con, $selet_base_checklist);
               while($cheklist_row = mysqli_fetch_assoc($base_checklist_query)) {
                   $cheklist_id = $cheklist_row["id"];
                   array_push($favorite_checklist_arr, $cheklist_id);

               }

           }

           for($j = 0; $j < count($favorite_checklist_arr); $j++) {
               $checklist_data = $favorite_checklist_arr[$j];
               $insert_all_releases = "INSERT INTO `favorite_checklists`(`user_id`, `checklist_id`, `checklist_type`, `date`) VALUES ($user_id, $checklist_data, 'basechecklist', '$data')";
               $query_all_releases = mysqli_query($con, $insert_all_releases);
           }
       }
        $sql="INSERT INTO `favorite_dates`(`sport_id`, `date_id`, `type`, `user_id`) VALUES ( $sport_id, $date_id, '$favorite_type', $user_id)";
        $result=mysqli_query($con, $sql);


       }else if($_POST['action'] == 'delete') {

        $sql = "DELETE FROM `favorite_dates` WHERE sport_id = $sport_id AND date_id = $date_id AND type = '$favorite_type' AND user_id = $user_id;";
        $sql .= "DELETE FROM `favorite_" . $parents_type .  "` WHERE date = '$data'";

        $result = $con -> multi_query($sql);

    }


}