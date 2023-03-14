<?php 
include "../../config/con1.php";
    if(!empty($_POST['f_data']) and !empty($_POST['t_data'])) {
        $from = $_POST['f_data'];
        $to = $_POST['t_data'];
        $dates = $from . '-' . $to;

        $sql = "INSERT INTO  dates (data) VALUES ('$dates')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            echo "<p class='text-success'>Inserted</p>";
        } else {
            echo "<p class='text-danger'>Please try again later</p>";
        }
    }else {
        echo "<p class='text-danger'>Please fill in all fields</p>";
    }
?>