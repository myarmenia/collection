<?php
    include "config/con1.php";

    $title = $_POST['title'];
    $discription = $_POST['discription'];
    $sporttype = $_POST['sporttype'];
    $producer = $_POST['producer'];
    $newstype = $_POST['newstype'];
    $user_id = $_POST['user_id'];

    $sql = "INSERT INTO `publications`(`title`, `titledescription`, `sport_type`, `producer`, `news_type`, `liked`, `watched`, `role`, `user_id`) VALUES ('$title', '$discription', '$sporttype', '$producer', '$newstype', 0, 0, 0, $user_id)";
    $result = mysqli_query($con, $sql);

    if($result) {
        echo "<p class='green'>The Publication has been sent for review</p>";
    }else {
        echo "<p class='red'>The Publication was not sent for review</p>";
    }

