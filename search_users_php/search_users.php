<?php

require "../config/con1.php";
require "../classes/pagination.php";

$start=0;
$limit=25;
$page=1;
$arr = [];

if(isset($_POST['search_user_id'])){
    $user_id = $_POST['search_user_id'];
}

if(isset($_POST['page'])){
    $page = $_POST['page'];
    if($_POST['page']>1){
        $start = (($_POST['page']-1)*$limit);
    }else{
        $start=0;
    }
}

if(isset($_POST['serch_type'])) {

    $serch_type = $_POST['serch_type'];



    if($serch_type == "all") {

        $sql = "SELECT * FROM USERS WHERE id != $user_id";

        if(!empty($_POST["country"])) {
            $country = $_POST["country"];
            $sql .= " AND country LIKE '%$country%'";
        }

        if(!empty($_POST["status"])) {
            $status = $_POST["status"];
            $sql .= " AND online = '$status'";
        }

        if(!empty($_POST['city'])) {
            $city = $_POST['city'];
            $sql .= " AND city LIKE '%$city%'";
        }

        if(!empty($_POST['rating'])) {
            $rating = $_POST['rating'];
            $sql .= " AND rating IN ($rating)";
        }

        $sql_pagination=$sql;

        $query_sql_pagination=mysqli_query($con, $sql_pagination);

        $pagination= new Pagination();
        $pagination->page=$page;
        $pagination->limit=$limit;
        $pagination->count_rows=mysqli_num_rows($query_sql_pagination);
        $sql.=" limit ".$start.','.$limit."";

        $query=mysqli_query($con,$sql);

        if(mysqli_num_rows($query) > 0) {

            while($users_rows = mysqli_fetch_assoc($query)) {

                if($users_rows['online'] == "online") {
                    $online_color = "green";
                }else {
                    $online_color = "red";
                }

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

                for($i = 0; $i < $users_rows["rating"]; $i++) {
                    $star_icons .= '<i class="fa fa-star" style="font-size:12px; color:gold"></i>';
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
        }else {
            $content = "<p style='text-align: center; width: 100%; font-size: 20px'><b>Nothing Found</b></p>";
        }

    }

    else if($serch_type == "nick") {

        $name = $_POST["name"];

        $select_users = "SELECT * FROM users WHERE id != $user_id AND name LIKE '%$name%'";
        $content = "";

        $sql_pagination = $select_users;
        $query_sql_pagination =  mysqli_query($con, $sql_pagination);

        $pagination = new Pagination();
        $pagination->page=$page;
        $pagination->limit=$limit;
        $pagination->count_rows=mysqli_num_rows($query_sql_pagination);
        // echo $sql;
        $select_users.=" limit ".$start.','.$limit."";

        $select_users_result = mysqli_query($con, $select_users);


        while($users_rows = mysqli_fetch_assoc($select_users_result)) {

            if($users_rows['online'] == "online") {
                $online_color = "green";
            }else {
                $online_color = "red";
            }

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

            for($i = 0; $i < $users_rows["rating"]; $i++) {
                $star_icons .= '<i class="fa fa-star" style="font-size:12px; color:gold"></i>';
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
    }

}else {
    $select_users = "SELECT * FROM users";
    $sql_pagination = $select_users;
    $query_sql_pagination = mysqli_query($con, $sql_pagination);

    $pagination = new Pagination();
    $pagination->page=$page;
    $pagination->limit=$limit;
    $pagination->count_rows=mysqli_num_rows($query_sql_pagination);
    // echo $sql;
    $select_users.=" limit ".$start.','.$limit."";
    $select_users_result = mysqli_query($con, $select_users);


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

        for($i = 0; $i < $users_rows["rating"]; $i++) {
            $star_icons .= '<i class="fa fa-star" style="font-size:12px; color:gold"></i>';
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
                        </div>';
    }

}

$arr['content']=$content;
$arr['sql']=$sql;
$arr['pagination']=$pagination->pages();
echo json_encode($arr);

?>


