<?php
include "header.php";
include "classes/pagination.php";
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
    if(!empty($_COOKIE['user'])){
        $user_id=$_COOKIE['user'];
    }
    if(!empty($_SESSION['user'])){
        $user_id=$_SESSION['user'];
    }
}
?>

<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- link fontawsome for like and dislike buttons -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

<link rel="stylesheet" type="text/css" href="css/news.css">

<link rel="stylesheet" type="text/css" href="css/publications.css">
<link rel="stylesheet" href="css/pagination.css">
<link rel="stylesheet" href="css/search_users.css?8">
</head>
<body>
<?php
include "cookie.php";

$select_users = "SELECT * FROM users WHERE id != $user_id LIMIT 25";
$select_users_result = mysqli_query($con, $select_users);

$select_users1 = "SELECT * FROM users WHERE id != $user_id";
$select_users_result1 = mysqli_query($con, $select_users1);

$pagination = new Pagination();
$pagination->limit = 25;
$pagination->count_rows = mysqli_num_rows($select_users_result1);

$content = "";

while($users_rows = mysqli_fetch_assoc($select_users_result)) {
    $star_icons = "";
    if($users_rows['image'] != "") {
        $image = $users_rows['image'];
    }else {
        $image = "user-icon.svg";
    }

    if($users_rows["country"] != "") {
        $country = $users_rows['country'] . ", ";
    }else {
        $country = "no country, ";
    }

    if($users_rows["city"] != "") {
        $city = $users_rows['city'];
    }else {
        $city = "no city";
    }

    $online_color = "";

    for($i = 0; $i < $users_rows["rating"]; $i++) {
        $star_icons .= '<i class="fa fa-star" style="font-size:12px; color:gold"></i>';
    }

    if($users_rows['online'] == "online") {
        $online_color = "green";
    }else {
        $online_color = "red";
    }

    $content .= '<div class = "first_part">
                             <input type="hidden" class="users_id" value="' . $users_rows["id"] . '">
                            <div class = "ci_logo_img">
                                <img src="./images_users/' . $image . '" alt="user image">
                            </div>
                            <p class = "user_name mb-0">' . $users_rows["name"] . '</p>
                            <p class = "country_city m-0">
                                <span>' . $country . '</span>
                                <span>' . $city . '</span>
                            </p>
                            <div class="rating">' .
        $star_icons
        . '</div>
                            <div class="online_offline">
                                <div style="background: ' . $online_color . '"></div>
                            </div>
                            
                        </div>';
}

$country = '';
$select_country = "SELECT country FROM users where country!='' Group BY country";
$select_country_result = mysqli_query($con, $select_country);

while($country_row = mysqli_fetch_assoc($select_country_result)) {
    $country .= '<option>' . $country_row["country"] . '</option>';
}

$city = '';
$select_city = "SELECT city FROM users where city!='' Group BY city";
$select_city_result = mysqli_query($con, $select_city);

while($city_row = mysqli_fetch_assoc($select_city_result)) {
    $city .= '<option>' . $city_row["city"] . '</option>';
}



?>

<section class="hide_div"></section>
<section class="section1 mt-5">
    <h2 class="text-center mb-3 font h2">Users</h2>
    <div class="mb-5 container statistics-container">

        <input type="hidden" class="user_id" value="<?= $user_id ?>">

        <div class="container section">
            <div class="type_name_input">
                <input type="text" class="form-control sel_inps serch_nick form-top" placeholder="Type name">
            </div>


            <div class="d-flex">
                <div class="flex-item-right p-2">
                    <p style="letter-spacing: 1px" class="show_filter">Apply Filters</p>
                    <input type="text" class=" form-control sel_inps search_country remove_select" placeholder="Type country">
                    <select class="sel select_country remove_input">
                        <option>Country</option>
                        <?= $country ?>
                    </select>
                    <input type="text" class=" form-control sel_inps search_city remove_select" placeholder="Type city">
                    <select class="sel select_city remove_input">
                        <option>City</option>
                        <?= $city ?>
                    </select>
                    <select class="sel select_status">
                        <option>Status</option>
                        <option value='online'>Online</option>
                        <option value='offline'>Offline</option>
                    </select>
                    <hr>
                    <p class="font-weight-bold">Rating</p>
                    <hr>
                    <div class="select_rating">
                        <div>
                            <input type="checkbox" class="search_rating" name="1">
                            <i class="fa fa-star" ></i>
                        </div>
                        <div>
                            <input type="checkbox" class="search_rating" name="2">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                        </div>
                        <div>
                            <input type="checkbox" class="search_rating" name="3">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                        </div>
                        <div>
                            <input type="checkbox" class="search_rating" name="4">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                        </div>
                        <div>
                            <input type="checkbox" class="search_rating" name="5">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                        </div>

                    </div>
                    <hr>
                    <button id="btn" class="w-50 clear_filter">Clear</button>
                    <button id="btn1" class="w-50 filter">OK</button>
                    <div class="filtration_status my-3" style="font-size: 18px; color:red"></div>
                </div>
                <div class="flex-item-left text-center p-2" style="flex:80%;">

                    <div class="info p-1 d-flex direction-column flex-wrap zzzz1">
                        <?= $content ?>
                    </div>
                    <div id="pagination">
                        <nav aria-label="Page navigation ">
                            <ul class="pagination justify-content-center r" >
                                <?php echo $pp= $pagination->pages(); ?>
                            </ul>
                        </nav>
                    </div>
                </div>
</section>
<?php include "footer.php"?>

<script src="user_js/search_users.js"></script>


</body>
</html>