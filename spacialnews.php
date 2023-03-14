<?php
    include "header.php";
    include "config/con1.php";
    // require_once "user-logedin.php";
    if(isset($_GET['news_id'])){
        $news_id=$_GET['news_id'];
    }

    $select_news = "SELECT * FROM news WHERE id = $news_id";
    $news_query = mysqli_query($con, $select_news);
    $news_rows = mysqli_fetch_assoc($news_query);

    $news_type = $news_rows["news_type"];

    $select_last_news = "SELECT * FROM news WHERE status=1 AND news_type='$news_type' AND id != $news_id ORDER BY id DESC  LIMIT 2";
    $query_last_news = mysqli_query($con, $select_last_news);
    $kk1 = mysqli_num_rows($query_last_news);

    while($last_news_rows = mysqli_fetch_assoc($query_last_news)) {
        $content .= "<div class='news_block'>
                    <div class='news_header'>
                        <p class='news_title'>".$last_news_rows['title']."</p>
                        <p class='news_date'>".date('d M Y',strtotime($last_news_rows['published_date']))."</p>
                    </div>
                    <div class='news_content'>
                        <div class='news_image'><img img src='admin/news/uploads/".$last_news_rows['img1']."'></div>
                        <div class='news_description'>
                            <p>".$last_news_rows['discription']."</p>
                            <div class='read_more_div'><a href='spacialnews.php?news_id=$last_news_rows[id]' target='_blank'>Read More</a></div>
                        </div>
                    </div>
                </div>";
    }


?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/single_news.css">

</head>
<body>
<?php include "cookie.php"; ?>
<section class=" p-2 news">
    <div class="container">
        <div id="news">
            <p class="h2 text-center news_tit"><?= $news_rows["title"] ?></p>
            <div class="news_images">
                <div class="img">
                    <img src="admin/news/uploads/<?= $news_rows['img1'] ?>" alt="">
                </div>
                <div class="img">
                    <img src="admin/news/uploads/<?= $news_rows['img2'] ?>" alt="">
                </div>
                <div class="img">
                    <img src="admin/news/uploads/<?= $news_rows['img3'] ?>" alt="">
                </div>
            </div>
            <p class="news_desc"><?= $news_rows['discription'] ?></p>
        </div>
        <div class="last_news_div">
            <p class="h2 text-center"><?= $news_type ?></p>
            <?= $content ?>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>


</body>
</html>


