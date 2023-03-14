<?php
    include "header.php";
    include "config/con1.php";
    require_once "user-logedin.php";

    if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
        if(!empty($_COOKIE['user'])){
            $user_id=$_COOKIE['user'];
        }
        if(!empty($_SESSION['user'])){
            $user_id=$_SESSION['user'];
        }
    
    }
    $arr_producer=['Upper Deck', 'Panini', 'Topps', 'Leaf', 'SeReal', 'Other', 'All','Custom','Other'];
    $arr_news_type=['Portal News', 'Manufacture News', 'Releases News', 'Sports News', 'Other News','Select All'];

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sel="SELECT * FROM publications WHERE id=$id";
        $res=mysqli_query($con, $sel);
        if(mysqli_num_rows($res)==1){
            $res_row=true;
            $row_this=mysqli_fetch_assoc($res);
        }
        else{
            $res_row=false;
        }
    }
    else{
        $res_row=false;
    }
 ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/checklist.css">
<link rel="stylesheet" type="text/css" href="css/create_publication.css">

</head>
<body>
<?php include "cookie.php"; ?>
<section class="hide_div"></section>
<section class = "main" style="min-height: 312px">
    <div class = "public">
        <p>ADD PUBLICATION</p>
    </div>
    <input type="hidden" class="user_id" value="<?= $user_id ?>">
    <div class="form-group">
        <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="title" value="<?= $res_row ? $row_this['title'] : '' ?>">
    </div>
    <div class="form-group">
        <label for="discription">Description</label>
        <textarea class="form-control" id="discription" placeholder="description"><?= $res_row ? $row_this['titledescription'] : '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="sporttype">Sports Type</label>
            <select  class="cen_sel form-control" id="sporttype">
            <?php
                $sql_news="SELECT*FROM sports_type";
                $query_news=mysqli_query($con,$sql_news);
                while($row=mysqli_fetch_assoc($query_news)){
                    echo $row['sport_type']==$row_this['sport_type'] ?
                            "<option selected>".$row['sport_type']."</option>" : 
                            "<option>".$row['sport_type']."</option>";

                }
            ?>

        </select>
    </div>
    <div class="form-group">
        <label for="producer">Manufacture</label>
        <select class = "cen_sel form-control" id="producer">
            <?php
                foreach ($arr_producer as $key => $value) {
                echo $value==$row_this['producer'] ?
                "<option selected>".$row_this['producer']."</option>" : 
                "<option>".$value."</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="newstype">News Type</label>
        <select class = "cen_sel form-control" id="news_type">
            <?php
                foreach ($arr_news_type as $key => $value) {
                echo $value==$row_this['news_type'] ?
                "<option selected>".$row_this['news_type']."</option>" : 
                "<option>".$value."</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <button class="btn <?= $res_row ? 'updatePublication' : 'addPublication' ?> p-2" type="submit"  style="width:120px;background: #FAD565;"><?= $res_row ? 'Update Publication' : 'Add Publication' ?></button>
    </div>
    <div class="text-center" id="result"></div>

</section>
<?php include "footer.php"; ?>
<script src="js/create_publication.js"></script>
</body>
</html>