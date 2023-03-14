<?php
    require "../config/con1.php";
    $checklist_id = mysqli_real_escape_string($con, $_POST["checklist_id"]);
    $type = $_POST['type'];
    $data = $_POST['date'];
    $check_type = $_POST['check_type'];

    if($check_type == 'checklist') {
        $check_type = 'checklists';
    }

    $sql = "DELETE FROM `favorite_" . $type . "` WHERE id = $checklist_id;";

    if($type == "dates") {
        $sql .= "DELETE FROM `favorite_" . $check_type . "` WHERE date = '$data'";
    }

    $result = $con -> multi_query($sql);
?>