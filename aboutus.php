<?php 	
    include "header.php";
    include "config/con1.php";
    $sql1="SELECT * FROM aboutus WHERE id=1";
    $query1=mysqli_query($con, $sql1);
    $row1=mysqli_fetch_assoc($query1);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/my_checklist.css">
<link rel="stylesheet" href="css/aboutus.css">


</head>

<body>
    <?php 
    include "cookie.php";
  

?>
<section id="sec"></section>
    <div class="start">
        <div class="nachalo">
            <p class="h2">About us</p>
        </div>
    </div>
        <div class="content">
            <div class="text1 text">With experience more than 16 years in cards collecting hobby, Follow My Collection provide you one of the best services in the world!</div>
            <div class="img1 images">
                <img src="aboutus_icons/img1.png" alt="">
            </div>
            <div class="img2 images">
                <img src="aboutus_icons/img2.png" alt="">
            </div>
            <div class="text2 text">Managing your collection has never been so simple & easy. Our database covers all sports & non-sports collections. For easy navigation it is divided into periods by years of release. User friendly interface allow you to choose many options!</div>
            <div class="img3 images">
                <img src="aboutus_icons/img3.png" alt="">
            </div>

            <div class="img4 images">
                <img src="aboutus_icons/img4.png" alt="">
            </div>
            <div class="text3">Here are our key futures:</div>
            <div class="text4 text">-Create & manage you own check-lists! It may be particular collection or you can add cards of your favorite player, team or league. Whatever you want!</div>
            <div class="img5 images">
                <img src="aboutus_icons/img5.png" alt="">
            </div>
            <div class="img6 images">
                <img src="aboutus_icons/img6.png " alt="">
            </div>
            <div class="img7 images">
                <img src="aboutus_icons/img7.png " alt="">
            </div>
            <div class="text5 text">-Share your work with other users or add existed check-lists to your “Favorites” page. Sharing your check-lists allow you to earn site points & achievements, that will expand your useability.</div>
            <div class="img8 images">
                <img src="aboutus_icons/img8.png " alt="">
            </div>
            <div class="text6 text">-Simple navigation & adding cards to your own collection, directly from manufacture check-lists.</div>
            <div class="img9 images">
                <img src="aboutus_icons/img9.png " alt="">
            </div>
            <div class="text7 text">-Get the latest news from industry! Our web-site is up-to-date every hour, directly from the market.</div>
            <div class="img10 images">
                <img src="aboutus_icons/img10.png " alt="">
            </div>
            <div class="img11 images">
                <img src="aboutus_icons/img11.png " alt="">
            </div>
            <div class="text8 text">-Make you own publications! Imagine to write articles about sports cards? You are in the right place! Follow My Collection allow you to create & share your articles. You can create or choose the topic of publications, by yourself & find your audience of readers.</div>
            <div class="img12 images">
                <img src="aboutus_icons/img12.png " alt="">
            </div>
            <div class="img13 images">
                <img src="aboutus_icons/img13.png " alt="">
            </div>
            <div class="text9 text">-Follow My Collection is free for use, but you can choose your subscription plan for adjust new futures & expand your useability.</div>
            <div class="img14 images">
                <img src="aboutus_icons/img14.png " alt="">
            </div>
            <div class="img15 images">
                <img src="aboutus_icons/img15.png " alt="">
            </div>
            <div class="text10 text">-Create & share your custom templates! For those who want to try his skills in design & make your collection more visible.</div>
            <div class="img16 images">
                <img src="aboutus_icons/img16.png " alt="">
            </div>
        </div>

<footer>
    <?php
include "footer.php";
?>
</footer>

</body>