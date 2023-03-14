<?php
 include "../../config/con1.php";
    if(isset($_POST['btn'])){

        echo "<meta http-equiv='refresh' content='2'>";

        $file_name = $_FILES['img']['name'];
        $file_tmp=$_FILES['img']['tmp_name'];
        $test=explode('.',$file_name);
        $extantion=end($test);
        $chanaparh = md5(rand(0,1000)).'.'.$extantion;

        $folder="../../images_banner/".$chanaparh;

        if($extantion != "jpg" && $extantion != "png" && $extantion != "jpeg" && $extantion != "gif" ){
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed in URL banner image";
        }
        else{
            move_uploaded_file($file_tmp, $folder);
            echo "Image moved";
        }

    }


?>