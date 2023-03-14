<?php
    include "header.php";
    require "config/con1.php";
    include "classes/pagination.php";
    include "classes/table.php";

    if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
        if(!empty($_COOKIE['user'])){
            $user_id=$_COOKIE['user'];
        }
            if(!empty($_SESSION['user'])){
                $user_id=$_SESSION['user'];
            }
    }

    $favorite_array = [];
    $color = '';

    $sss = "SELECT release_id FROM `favorite_release`";
    $sss_query = mysqli_query($con, $sss);
    while($ttt = mysqli_fetch_assoc($sss_query)) {
        array_push($favorite_array, $ttt['release_id']);
    }

    $data = $_GET['date'];
    $from_data = explode("-", $data)[0];
    $to_data = explode("-", $data)[1];
    $type_id = $_GET['sport_type'];

    $sport_type="SELECT sport_type from sports_type where id = $type_id";
    $sport_type_querry=mysqli_query($con,$sport_type);
    $sport_row=mysqli_fetch_assoc($sport_type_querry);
    $sport_name=$sport_row['sport_type'];
    
    $collections_types= "SELECT * FROM collections where sport_type = '$sport_name' AND `year_of_releases` BETWEEN $from_data AND $to_data order By id DESC";
    $collections_types_querry=mysqli_query($con,$collections_types);
    $total_rows_query=mysqli_query($con, $collections_types);
    $take_collections_types = '';
    $num_rows = mysqli_num_rows($collections_types_querry);

//
//    $conditions = array('user_id' => $user_id, 'status' => $status, "delete_status" => 1);
//    $tables = new Tables();
//    $tables -> tblName = 'collections';
//    $tables -> limit = 20;
//    $table = $tables -> Table($con, $conditions);
//
//    $pagination = new Pagination();
//    $pagination -> limit = 20;
//    $pagination -> count_rows = mysqli_num_rows($total_rows_query);
//    $num_rows = mysqli_num_rows($collections_types_querry);

    if($num_rows > 0) {
        while ($collections_row = mysqli_fetch_assoc($collections_types_querry)) {

            for($i = 0; $i < count($favorite_array); $i++) {
                if($collections_row['id'] == $favorite_array[$i]) {
                    $color = 'gold';
                    break;
                }else {
                    $color = 'white';
                }
            }
                $take_collections_types .=
                '
                <div class="cont_box_second_box">

                    <div class="second_box1">
                    
                    <svg data-id="' . $collections_row['id'] . '" data-src="' . $collections_row['image'] . '" class="rel_image" style=" cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal" width="69" height="55" viewBox="0 0 69 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1887_2)">
                    <path d="M68.7861 9.36152V51.6287C67.5324 54.3446 66.4584 54.9861 63.1499 54.9861H5.49995C5.23057 54.9861 4.96467 54.9861 4.69529 54.9861C2.15003 54.8803 0.205688 53.1486 0.205688 50.9373C0.205688 37.3081 0.205688 23.681 0.205688 10.0561C0.201074 9.5009 0.327742 8.95124 0.577264 8.44372C0.826786 7.9362 1.19343 7.48249 1.65272 7.11283C2.65425 6.25945 3.88024 5.99472 5.22367 5.99783C24.7293 5.99783 64.148 5.99783 64.3483 5.99783C65.3374 6.02401 66.2904 6.3391 67.0639 6.89571C67.8374 7.45231 68.3897 8.22035 68.6376 9.08432C68.6777 9.18057 68.7274 9.27334 68.7861 9.36152V9.36152ZM64.8767 37.2147C64.8939 36.9313 64.9043 36.816 64.9043 36.7008V10.4298C64.9043 9.68231 64.7454 9.5515 63.8682 9.5515H5.12353C4.21524 9.5515 4.08746 9.66986 4.08746 10.5108C4.08746 20.3547 4.08746 30.1987 4.08746 40.0427C4.08746 40.2109 4.10818 40.379 4.12199 40.6157C4.37755 40.4538 4.55714 40.3448 4.72982 40.2233L15.5394 32.8014C17.7186 31.3064 20.25 31.2005 22.5812 32.5242L32.8796 38.3733C33.9157 38.9557 34.3232 38.909 35.1313 38.1023C39.446 33.8084 43.7606 29.5114 48.0752 25.2113C50.0921 23.2118 52.8376 23.3146 54.6818 25.4262C55.7697 26.672 56.8506 27.9334 57.9351 29.1854C60.2178 31.8203 62.4937 34.4521 64.8767 37.2147ZM51.2283 27.1485C51.1375 27.3136 51.0324 27.4719 50.914 27.622C46.6477 31.8764 42.3826 36.1329 38.1186 40.3915C35.9498 42.5717 33.4805 42.8831 30.7246 41.3072C27.3332 39.3782 23.9384 37.4504 20.5401 35.5235C20.155 35.2575 19.6786 35.1218 19.1939 35.14C18.7093 35.1582 18.247 35.3292 17.8878 35.6232C13.4511 38.6671 9.0122 41.71 4.57095 44.7518C4.40726 44.8477 4.27531 44.9816 4.189 45.1395C4.10269 45.2974 4.06522 45.4733 4.08055 45.6488C4.10818 47.2808 4.08055 48.9097 4.08055 50.5417C4.08055 51.3235 4.22215 51.4543 5.09589 51.4543H63.889C64.7627 51.4543 64.9043 51.3204 64.9043 50.5386C64.9043 48.184 64.9043 45.8295 64.9043 43.4749C64.8942 43.1452 64.7738 42.826 64.5589 42.5592C61.3356 38.7865 58.0905 35.0221 54.8234 31.2659L51.2283 27.1485Z" fill="white"/>
                    <path d="M34.4959 22.2094C34.4959 23.5754 34.0921 24.9106 33.3357 26.0457C32.5793 27.1809 31.5043 28.0649 30.2472 28.5855C28.99 29.1062 27.6073 29.2401 26.2743 28.9703C24.9413 28.7005 23.718 28.0391 22.7596 27.0701C21.8013 26.101 21.151 24.8679 20.8911 23.527C20.6313 22.1862 20.7737 20.7981 21.3002 19.5386C21.8268 18.2792 22.7137 17.2052 23.8487 16.4528C24.9836 15.7004 26.3154 15.3035 27.6752 15.3124C29.4877 15.3261 31.2215 16.0586 32.4989 17.3504C33.7764 18.6421 34.4942 20.3885 34.4959 22.2094ZM27.6165 25.1721C28.0066 25.18 28.3943 25.1095 28.7568 24.9647C29.1194 24.82 29.4495 24.6039 29.7278 24.3292C30.0061 24.0545 30.227 23.7267 30.3774 23.365C30.5278 23.0034 30.6048 22.6152 30.6038 22.2232C30.6065 21.8323 30.5326 21.4447 30.3862 21.0825C30.2398 20.7203 30.0238 20.3907 29.7506 20.1123C29.4773 19.834 29.1522 19.6124 28.7937 19.4603C28.4353 19.3082 28.0505 19.2285 27.6614 19.2258C27.2723 19.223 26.8864 19.2973 26.5259 19.4444C26.1653 19.5915 25.8371 19.8084 25.56 20.0829C25.283 20.3574 25.0624 20.684 24.911 21.0441C24.7596 21.4042 24.6802 21.7907 24.6775 22.1816C24.6687 22.5735 24.7384 22.9632 24.8825 23.3276C25.0266 23.6919 25.2421 24.0234 25.5163 24.3024C25.7905 24.5813 26.1177 24.8021 26.4785 24.9515C26.8393 25.1009 27.2263 25.176 27.6165 25.1721Z" fill="white"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_1887_2">
                    <rect width="68.5735" height="54.5789" fill="white" transform="translate(0.212891 0.421143)"/>
                    </clipPath>
                    </defs>
                    </svg>
                    </div>
                    <div class="second_box2"><p class="second_box2_text">' . $collections_row['year_of_releases'] .'</p></div>
                    <div class="second_box3"><p class="second_box3_text">'. $collections_row['producer'] .'</p></div>
                    <div class="second_box4"><p class="second_box4_text">'. $collections_row['name_of_collection'] .'</p></div>
                    <div class="second_box5"><i class="star_o fa fa-star favorite_release" style="color:' . $color . '" data-r-id="' . $collections_row['id']  . '"></i></div>
                </div>
                ';
        }
    }else {
        $take_collections_types = 
        "
            <div class='cont_box_second_box'><p class='empty_text'>NOTHING FOUND</p></div>
        ";
    }
?>
<?php require "cookie.php"?>
<link rel="stylesheet" type="text/css" href="css/single_checklist.css?6">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

<style>
    .modal-body {
        padding: 0 !important;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-direction: column;
    }
</style>


    <input type="hidden" value="<?= $user_id ?>" class="user_id">

    <div class="container55">
        <div class="hash1">
           
        </div>
        <div class="hash2">
            <h2 class="text-center">LIST OF <?= $sport_name ?> RELEASES FOR <span class="data11"><?= $data ?></span></h2>
        </div>
        <div class="sectione_table">
        <br>
            <div class="content_box">
                <div class="cont_box_first">
                    <div class="reload">
                        <span class="reload_page">
                            <svg width="30" height="15" viewBox="0 0 29 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.4945 6.40441e-06C7.36109 6.40441e-06 1.46469 5.33915 0.609375 12.25H4.1482C4.50426 10.1398 5.49659 8.18881 6.9923 6.65828C8.48801 5.12775 10.4157 4.09079 12.5171 3.68627C14.6186 3.28176 16.7934 3.52902 18.7504 4.39492C20.7074 5.26083 22.3531 6.70404 23.4671 8.53126L19.7484 12.25H28.5V3.50001L25.9964 6.0036C24.7063 4.14871 22.9863 2.63378 20.9833 1.58829C18.9803 0.542798 16.754 -0.002155 14.4945 6.40441e-06Z" fill="#133960"/>
                            </svg>
                            <svg width="30" height="15" viewBox="0 0 29 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.1482 0.745117H0.5V9.49512L3.09 7.11129C4.38269 8.9321 6.09263 10.4169 8.07676 11.4414C10.0609 12.4659 12.2615 13.0003 14.4945 13C21.6389 13 27.526 7.64887 28.3906 0.745117H24.8518C24.4998 2.82957 23.5269 4.75926 22.0603 6.28171C20.5937 7.80415 18.7016 8.84845 16.6318 9.27798C14.5619 9.7075 12.4106 9.50225 10.4593 8.68907C8.508 7.87589 6.84759 6.49266 5.69531 4.72035L10.02 0.745117H4.1482Z" fill="#133960"/>
                            </svg>
                        </span>
                    </div>
                    <div class="Picture"><p class="pic_text">PICTURE</p></div>
                    <div class="year"><p class="year_text">YEAR</p></div>
                    <div class="manifuter"><p class="manifuter_text">MANUFACTURE</p></div>
                    <div class="colname"><p class="colname_text">COLLECTION NAME</p></div>
                </div>
                <div class="cont_box_second">
                    <?= $take_collections_types?>
                    <div class="mt-3">
                        <nav aria-label="Page navigation ">
                            <ul class="pagination justify-content-center r" >
<!--                                --><?php //echo $pp= $pagination->pages(); ?>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>

                <!-- Modal -->
               
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <img src='' alt="relese_image" id="modal_picture" style="height: 200px; width: 400px">
                          <a href="base_checklist.php?" id="show_more">Show more</a>
                      </div>

                    </div>
                  </div>
                </div>
   
    </div>
    </div>
    <div class="up_foo">

    </div>
    <?php require "footer.php"?>

    <script src="js/release_single_page.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
