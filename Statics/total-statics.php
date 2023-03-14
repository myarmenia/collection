<?php
    require "config/con1.php";

    $publications_published = [];   

    // veradarcnum e checklisteri @ndhanur qanak@ @st typer-i
    $count_sport_type = "SELECT Count(sport_type) as count, sport_type FROM `publications` WHERE `user_id`=$user_id Group By sport_type";
    // veradarcnum e bolor typer@
    $sport_type = "SELECT sport_type FROM `publications` WHERE `user_id`=$user_id";
    // ashxatacnum e sql harcumner@
    $count_sport_result = mysqli_query($con, $count_sport_type);
    $sport_result = mysqli_query($con, $sport_type);
    // veradarcnum e typer-i qanakner@
    $sport_count_number_row = mysqli_num_rows($sport_result);

    while($sport_row = mysqli_fetch_assoc($count_sport_result)) {
        //hashvum enq te mer arandzin typeri checlisteri qanak@ @ndhanuri qani tokosn e
        // $sport_percent = $sport_row['count'] * 100 / $sport_count_number_row;
        //tpum enq zangvac vorov ashxatum e grafikan
        array_push ($publications_published, array("label"=>$sport_row['sport_type'], "y"=> $sport_row['count']));
    }



    $public_checklist_statics_array = [];

    $count_public_checklist = "SELECT Count(sport_type) as count, sport_type FROM `custom_name_checklist` WHERE status = 0 AND `user_id`=$user_id Group By sport_type";
    $public_checklist = "SELECT sport_type FROM `custom_name_checklist` WHERE status = 0 AND `user_id`=$user_id";
    $public_checklist_result = mysqli_query($con, $public_checklist);
    $count_public_checklist_result = mysqli_query($con, $count_public_checklist);
    $public_checklist_number_row = mysqli_num_rows($public_checklist_result);
    while($public_checklist_row = mysqli_fetch_assoc($count_public_checklist_result)) {
        // $public_checklist_percent = $public_checklist_row['count'] * 100 /  $public_checklist_number_row;
        array_push ($public_checklist_statics_array, array("label" => $public_checklist_row['sport_type'], "y"=> $public_checklist_row['count']));
    }



    $privite_checklist_statics_array = [];

    $count_privite_checklist = "SELECT Count(sport_type) as count, sport_type FROM `custom_name_checklist` WHERE status = 1 AND `user_id` = $user_id Group By sport_type";
    $privite_checklist = "SELECT sport_type FROM `custom_name_checklist` WHERE status = 1 AND `user_id` = $user_id";
    $privite_checklist_result = mysqli_query($con, $privite_checklist);
    $count_privite_checklist_result = mysqli_query($con, $count_privite_checklist);
    $privite_checklist_number_row = mysqli_num_rows($privite_checklist_result);
    while($privite_checklist_row = mysqli_fetch_assoc($count_privite_checklist_result)) {
        // $privite_checklist_percent = $privite_checklist_row['count'] * 100 /  $privite_checklist_number_row;
        array_push ($privite_checklist_statics_array, array("label"=>$privite_checklist_row['sport_type'], "y"=> $privite_checklist_row['count']));
    }



    $total_cards = [];

    $count_cards = "SELECT Count(sport_type) as count, sport_type FROM `custom_checklist` WHERE `cid`=$user_id Group By sport_type";
    $cards = "SELECT sport_type FROM `custom_checklist` WHERE `cid`=$user_id";
    $cards_result = mysqli_query($con, $cards);
    $count_cards_result = mysqli_query($con, $count_cards);
    $cards_number_row = mysqli_num_rows($cards_result);
    while($cards_row = mysqli_fetch_assoc($count_cards_result)) {
        // $cards_percent = $cards_row['count'] * 100 /  $cards_number_row;
        array_push ($total_cards, array("label"=>$cards_row['sport_type'], "y"=> $cards_row['count']));
    }



    $total_collection1 = [];

    $count_collections = "SELECT Count(sport_type) as count, sport_type FROM `custom_name_checklist` WHERE `user_id`=$user_id Group By sport_type";
    $collections = "SELECT sport_type FROM `custom_name_checklist` WHERE `user_id`=$user_id";
    $collections_result = mysqli_query($con, $collections);
    $count_collections_result = mysqli_query($con, $count_collections);
    $public_collections_row = mysqli_num_rows($collections_result);
    while($collections_row = mysqli_fetch_assoc($count_collections_result)) {
        // $public_checklist_percent = $public_checklist_row['count'] * 100 /  $collections_number_row;
        array_push ($total_collection1, array("label" => $collections_row['sport_type'], "y"=> $collections_row['count']));
    }

 ?>