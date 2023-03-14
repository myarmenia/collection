<?php
include "../heder.php";
if(empty($_SESSION['login']) || $_SESSION['login']!="admin"){
    header('location:../index.php');
}

?>
<body>
<?php
include "../menu.php";
include "../../config/con1.php";
?>

<div class="content">
    <div class="container-fluid">

        <!-----------------------add image------------------------------------->
        <div class="row">
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Choose image file</h4>
                    </div>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="card-body ">
                            <input type="file" name="img" accept="image/*">
                        </div>
                        <div class="card-footer ">
                            <button type="submit" class="btn btn-fill btn-add" name="btn">Add choosen image file</button>
                        </div>
                    </form>
                    <?php
                    include "uploaded_image.php";
                    ?>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Show all images for banner</h4>
                    </div>
                    <div class="card-body ">
                        <button type="submit" class="btn btn-fill btn-add show" name="">Show</button>
                        <div id="chartHours" class="ct-chart img_cont"></div>
                    </div>
                    <div class="card-footer ">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "../footer.php";
    ?>
    <script src="../my_js/banner.js"></script>
</body>
</html>
