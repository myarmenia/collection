<?php
include "header.php";
include "config/con1.php";
require_once "user-logedin.php";
include "classes/pagination.php";
include "classes/table.php";
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
    if(!empty($_COOKIE['user'])){
        $user_id=$_COOKIE['user'];
    }
    if(!empty($_SESSION['user'])){
        $user_id=$_SESSION['user'];
    }

    if(isset($_GET['type'])) {
            $type = $_GET['type'];
    }else {
            $type = 'release';
    }

}

?>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/my_checklist.css">
<link rel="stylesheet" type="text/css" href="css/checklist.css">
<link rel="stylesheet" href="css/pagination.css">
</head>
<body>
<?php include "cookie.php"; ?>
<section class="hide_div"></section>
<section class="section1 mt-5">
    <div class="my-5 container" style="min-height: 211px">
        <h2 class="text-center mb-5 font">FAVORITE <?= $type ?></h2>
         <div class="add_button">
            <div class="define ml-auto mr-auto">
                    <input type="hidden" class="type" value="<?= $type ?>">
                <?php
                        if($type == "release") {
                ?>
                    <a class="def_active" href="?type=release">Releases</a>
                    <a class="def_passive" href="?type=checklists">Checklists</a>
                    <a class="def_passive" href="?type=collectors">Collectors</a>
                    <a class="def_passive" href="?type=dates">Dates</a>
                <?php
                        }else if($type == 'checklists') {
                ?>
                    <a class="def_passive" href="?type=release">Releases</a>
                    <a class="def_active" href="?type=checklists">Checklists</a>
                    <a class="def_passive" href="?type=collectors">Collectors</a>
                    <a class="def_passive" href="?type=dates">Dates</a>
                <?php
                        }else if($type == 'collectors') {
                ?>
                    <a class="def_passive" href="?type=release">Releases</a>
                    <a class="def_passive" href="?type=checklists">Checklists</a>
                    <a class="def_active" href="?type=collectors">Collectors</a>
                    <a class="def_passive" href="?type=dates">Dates</a>
                <?php
                        }else if($type == 'dates') {
                ?>
                    <a class="def_passive" href="?type=release">Releases</a>
                    <a class="def_passive" href="?type=checklists">Checklists</a>
                    <a class="def_passive" href="?type=collectors">Collectors</a>
                    <a class="def_active" href="?type=dates">Dates</a>
                <?php
                    }else {
                ?>
                    <a class="def_active" href="?type=release">Releases</a>
                    <a class="def_passive" href="?type=checklists">Checklists</a>
                    <a class="def_passive" href="?type=collectors">Collectors</a>
                    <a class="def_passive" href="?type=dates">Dates</a>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="w-100 cards mb-5 " >
        <?php
        $id = 0;

//

        $sql="SELECT * FROM favorite_" . $type . " where user_id=$user_id";

        $query=mysqli_query($con, $sql);
        $total_rows_query=mysqli_query($con, $sql);

        $type_name = mysqli_fetch_assoc($query);

        $conditions = array('user_id' => $user_id);
        $tables = new Tables();
        $tables -> tblName = 'favorite_' . $type;
        $tables -> limit = 20;
        $table = $tables -> Table($con, $conditions);

        $pagination = new Pagination();
        $pagination -> limit = 20;
        $pagination -> count_rows = mysqli_num_rows($total_rows_query);
        $num_rows = mysqli_num_rows($query);
           if($num_rows > 0){  
        ?>
            <table class="table" id="checklists" data-name="favorite_<?= $type ?>">
                <thead>
                    <tr>
                        <?php
                            if($type == 'release' || $type == 'checklists' ) {
                        ?>
                            <th data-field="id" class="text-center">#</th>
                            <th data-field="Card number">Name <?= $type ?></th>
                            <th data-field="Card year">Actions</th>

                        <?php
                            }else if($type == 'dates') {
                        ?>
                            <th data-field="id" class="text-center">#</th>
                            <th data-field="Card number">Data</th>
                            <th data-field="Card number">Favorite_type</th>
                            <th data-field="Card number">Sport_type</th>
                            <th data-field="Card year">Actions</th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody id="num-rows" data-rows="<?=mysqli_num_rows($total_rows_query)?>">
                    <?php
                        $count = 0;
                        while($row=mysqli_fetch_assoc($table)) {
                            $id = $row['id'];
                            $count++;
                            // --- petq e poxel ------------
                            // $tblName=$row['checklist_type'];
                            // $tblName='collections';

                            if ($type == 'release') {
                                $checklist_name="SELECT name_of_collection FROM collections WHERE id=$row[release_id]";
                            } else if ($type == 'dates') {
                                $checklist_name="SELECT data FROM dates WHERE id=$row[date_id]";
                                $sport_type = "SELECT sport_type FROM sports_type WHERE id = $row[sport_id]";
                                $sport_type_query = mysqli_query($con, $sport_type);
                                $sport_row = mysqli_fetch_assoc($sport_type_query);
                                $sport_name = $sport_row['sport_type'];
                            } else if($type == 'checklists') {
                                $checklist_name="SELECT card_name FROM base_checklist WHERE id=$row[checklist_id]";
                            }

                            $query_checklist_name=mysqli_query($con, $checklist_name);

                            $row_name=mysqli_fetch_assoc($query_checklist_name);

                                if($type == 'release') {
                                $kkkk1 .=  "<tr class='tr_checklist'>
                                    <td>".$count."</td>
                                    <td class='info'>" . $row_name['name_of_collection'] . "</td>
                                    <td data-collId='".$id."' style='text-align: center'>
                                        <i class='fa fa-trash' style='font-size:30px; color: #6EA4AE; cursor: pointer'></i>
                                    </td>
                                </tr>";
                                } else if($type == 'dates') {
                                    $kkkk1 .=  "<tr class='tr_checklist'>
                                            <td>".$count."</td>
                                            <td class='info' style='width: 50%'>".$row_name['data']."</td>
                                            <td style='text-align: center' class='typee'>" . $row['type'] . "</td>
                                            <td style='text-align: center'>" . $sport_name . "</td>
                                            <td data-collId='".$id."' style='text-align: center'>
                                                <i class='fa fa-trash' style='font-size:30px; color: #6EA4AE; cursor: pointer'></i>
                                            </td>
                                    </tr>";
                                } else if($type == 'checklists') {
                                    $kkkk1 .=  "<tr class='tr_checklist'>
                                        <td>".$count."</td>
                                        <td class='info'>".$row_name['card_name']."</td>
                                        <td data-collId='".$id."' style='text-align: center'>
                                            <i class='fa fa-trash' style='font-size:30px; color: #6EA4AE; cursor: pointer'></i>
                                        </td>
                                    </tr>";
                                }


                        }

                        echo $kkkk1;
                    ?>
                </tbody>
            </table>
        <?php
        }
        else{
            echo "<div class='text-center'>Nothing found</div>";
        }
        ?>
        <div class="mt-3">
            <nav aria-label="Page navigation ">
                <ul class="pagination justify-content-center r" >
                <?php echo $pp= $pagination->pages(); ?>
                </ul>
            </nav>
        </div>
        </div>
    </div>
    <div class="delete"></div>
</section>
<?php include "footer.php"; ?>

<script src="user_js/favorite_checklist.js"></script>
<!--<script src="js/checklist.js"></script>-->


</body>
</html>