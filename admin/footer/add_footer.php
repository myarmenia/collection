<?php
include "../heder.php";
include "../../config/con1.php";
$sql="SELECT * FROM footer";
$res=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($res);

$content = "";

$sql1 = "SELECT * FROM footer_banner";
$res1 = mysqli_query($con, $sql1);
$number = mysqli_num_rows($res1);


?>





<link rel="stylesheet" href="../css/footer.css">

<body>
<?php
include "../menu.php";

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 add-bs" style="margin: 0 auto">
                <div class="card stacked-form">
                    <div class="card-header ">
                        <h4 class="card-title">Add Footer</h4>
                        <p></p>
                        <div>
                            <div class="text-success">
                                <h5><?php echo $_SESSION['success']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <form method="post" action="changeFooter.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title3</label>
                            <input type="text" class="form-control" name="z5" value="<?php echo $row['Contact']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Text3</label>
                            <input type="text"  class="form-control" name="z6" value="<?php echo $row['Contact_text']; ?>">
                        </div>
                        <div class="card-footer ">
                            <button type="submit" class="btn btn-fill btn-add" name="btn-connect">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 add-bs" style="margin: 0 auto; min-height: 460px">
                <div class="card stacked-form">

                    <div class="card-header ">
                        <h4 class="card-title">Banner</h4>
                        <p></p>
                    </div>
                    <input type="hidden" value="<?= $number ?>" id="qty_banners">
                    <form action="#"  method="post" enctype="multipart/form-data" role="form" id="add_banner">
                        <div class="form_content">

                        </div>
                        <button class="send" disabled>Save All Banners</button>
                    </form>
                    <div class="icon">
                        <span class="icon">Add Banner</span>
                        <i class="fa fa-plus-circle add"></i>
                    </div>
                    <div class="status"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../footer.php";
?>
<script src="../my_js/footer_banner.js"></script>
<script>
    $('.select').change(function(){
        if($(this).val()=='Other sport'){
            $('html select').after("<input type='text' placeholder='Enter sport type' class='form-control' name='other-sport-type'>");
            $(this).remove()
        }
    })
    $('#add_input').click(function(){
        $('#ul').append('<li><input type="text" placeholder="" class="form-control" name="desc[]"></li>')
    })


</script>

</body>
</html>