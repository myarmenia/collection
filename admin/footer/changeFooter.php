<?php
session_start();
include "../../config/con1.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name1 = $_POST['z1'];
    $name2 = $_POST['z2'];
    $name3 = $_POST['z3'];
    $name4 = $_POST['z4'];
    $Contact = $_POST['z5'];
    $Contact_text = $_POST['z6'];

    $sql = "UPDATE footer SET 
    Contact = '$Contact',
    Contact_text = '$Contact_text'";


    $res = mysqli_query($con, $sql);
    if($res){
        header('location:add_footer.php');
        $_SESSION['success']="Successfully updated";
    }else{
        echo "no";
    }
}
?>