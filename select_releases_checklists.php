<?php
    include "header.php";
    require "config/con1.php";
    if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
        if(!empty($_COOKIE['user'])){
            $user_id=$_COOKIE['user'];
        }
            if(!empty($_SESSION['user'])){
                $user_id=$_SESSION['user'];
            }
    }

?>


    <link rel="stylesheet" type="text/css" href="css/week_calendar.css">
    <link rel="stylesheet" type="text/css" href="css/year_calendar.css">
    <link rel="stylesheet" type="text/css" href="css/mounth_calendar.css">
    <link rel="stylesheet" type="text/css" href="css/relese_checklist_first.css">
    <link href=" https://cdn.jsdelivr.net/npm/swiper@9.1.0/swiper-bundle.min.css" rel="stylesheet">



<body>
<?php require "cookie.php"?>

<section class="hide_div"></section>


<section class="section1 my-5">
    <div class="relese_width">
        <?php require "relese_checklist/relese_checklist_first1.php"?>
    </div>
    <div class="calendar_width">
        <?php require "calendar/calendar.php"?>
        
    </div>
    <div class="hide_div1">

    </div>
</section>

<?php require "footer.php"?>
<script src="js/relese_checklist_first.js"></script>

</body>
