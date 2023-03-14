<?php
    include "header.php";
    include "config/con1.php";

    $select_news_type = "SELECT news_type FROM news GROUP BY news_type";
    $query_news_type = mysqli_query($con, $select_news_type);
    $content = "";
    $k1 = 0;



    while($news_type_row = mysqli_fetch_assoc($query_news_type)) {
        $k1++;

        if($k1 == 5 ) {
            $class = "news_block1";
        }else {
            $class = "news_block";
        }

        $select_last_news = "SELECT * FROM news WHERE news_type = '" . $news_type_row["news_type"] . "' AND status='1' GROUP BY id DESC LIMIT 1";
        $query_last_news = mysqli_query($con, $select_last_news);
        $last_news = mysqli_fetch_assoc($query_last_news);

        $description = $last_news['discription'];
        $description = explode(" ",$description);
        $description = array_slice($description, 0, 20);
        $description = implode(" ", $description);

        $content .= '  <div class="' . $class . '">
                    <div class="news_header">
                        <p class="h4">' . $news_type_row['news_type'] . '</p>
                    </div>
                    <div class="news_content">
                        <p class="title">' . $last_news['title'] . '</p>
                        <p class="subtitle">' . $description . '</p>
                    </div>
                    <div class="news_footer">
                        <button class="see_more" data-type="' . $news_type_row['news_type'] . '">More</button>
                    </div>
                </div>';
    }

?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/new_news.css">
</head>
</head>
<body>
<?php include "cookie.php"; ?>
<section class=" p-2 news">
    <div class="container-fluid">
        <div class="d-flex flex-wrap justify-content-center news_filter">
            <div class=" news_second">

                <?= $content ?>

            </div>
        </div>
    </div>
</section>

<script>
    $(".see_more").click(function () {
        let link = $(this).attr("data-type")
        location.assign("news.php?news_type=" + link)
    })
</script>

<?php
include "footer.php";
?>
</body>
</html>
