<?php
include "header.php";
include "config/con1.php";
require_once "user-logedin.php";

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/my_checklist.css">
</head>
<body>
<?php
    include "cookie.php";

    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        $favorite_url = 'favorite-checklists.php?id=' . $id;
        $custom_url = 'Custom-checklist.php?id=' . $id;
    }else {
        $favorite_url = 'favorite-checklists.php';
        $custom_url = 'Custom-checklist.php?public';
    }


?>
<section style="height: 100px"></section>
<section class="section1 mt-5">
    <div class="my-5 container">
        <h2 class="text-center mb-5">MY CHECKLISTS</h2>
        <div class="w-100 cards d-flex flex-wrap justify-content-around mb-5 " >
            <a href='<?= $favorite_url ?>'><div class=" py-5 px-5 text-center card-div">
                <img src="icons/favorites.png"><h5 class="mt-5 text-white">FAVORITES</h5>
            </div></a>
            <a href='<?= $custom_url ?>'><div class="py-5 px-5 text-center card-div">
                <img src="icons/custom.png"><h5 class="mt-4 text-white">CUSTOM</h5>
            </div></a>
            
        </div>
    </div>
</section>
<?php include "footer.php"; ?>
</body>
</html>