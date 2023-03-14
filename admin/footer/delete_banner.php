<?php
    require "../../config/con1.php";

    if(isset($_POST['delete_id'])) {
        $id = $_POST['delete_id'];
        $sql = "DELETE FROM `footer_banner` WHERE id=$id";
        $res = mysqli_query($con, $sql);
    }
?>