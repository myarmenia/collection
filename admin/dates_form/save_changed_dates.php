<?php 
    include "../../config/con1.php";

  if($_SERVER["REQUEST_METHOD"]=="POST"){
      
    $id=mysqli_real_escape_string($con, $_POST['id']);
    $dates=mysqli_real_escape_string($con, $_POST['dates']);
    
     
     $sql="UPDATE dates SET data='$dates' WHERE id=$id";
     mysqli_query($con, $sql);

}
   
    if(isset($_POST['remove_id'])){
        $remove_id=mysqli_real_escape_string($con, $_POST['remove_id']);
        
        $sql_delete="DELETE FROM dates WHERE id=$remove_id";
        mysqli_query($con, $sql_delete);
    }
?>