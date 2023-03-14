<?php
    require "../../config/con1.php";
    $link = $_POST['link'];

    for( $i = 0; $i < COUNT($link); $i++ ) {
        $file_name = $_FILES['file']['name'];
        $file_tmp=$_FILES['file']['tmp_name'];
        $test=explode('.',$file_name[$i]);
        $extension=end($test);
        $chanaparh = md5(rand(0,1000)).'.'.$extension;

        if(move_uploaded_file($file_tmp[$i], '../Footer_banner/' . $chanaparh)) {
            $sql = "INSERT INTO `footer_banner`(`link`, `image`) VALUES ('$link[$i]','$chanaparh')";
            $query = mysqli_query($con, $sql);
        }

    }

    if($query) {
        echo "<p>bbbb6urthgnv </p>";
    }

?>
