<?php
    require "config/con1.php";

    $id = $_POST["id"];
    $user_id = $_POST["user_id"];
    $data = $_POST["data"];

    echo $_POST['action'];

    if($_POST['action'] == 'add') {

        $sql = "INSERT INTO `favorite_release`(`release_id`, `user_id`, `date`) VALUES ($id, $user_id, '$data')";
        $result = mysqli_query($con, $sql);

    }

    else if($_POST['action'] == 'delete') {

        $sql = "DELETE FROM `favorite_release` WHERE release_id = $id AND user_id = $user_id AND date = '$data'";
        $result = mysqli_query($con, $sql);

    }


