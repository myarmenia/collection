<?php
include "config/con1.php";
include "header.php";
include "classes/pagination.php";

?>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/base_checklist.css">
<link rel="stylesheet" href="css/pagination.css">

<!-- ---------------------------------- -->
<!--     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />-->
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />-->
<!--     CSS Files-->
<!--     <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" />-->
<!--     <link href="admin/assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />-->
<!--     CSS Just for demo purpose, don't include it in your project-->
<!-- <script src="admin/assets/js/core/bootstrap.min.js" type="text/javascript"></script>-->

<!--    <link href="admin/assets/css/demo.css" rel="stylesheet" />-->
<!--     <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>-->


<style>
    /*.table.table-hover.dataTable.no-footer.fixedHeader-locked{*/
        /*display: none;*/
    /*}*/
</style>
</head>
    <body class="page_fix">
        <?php include "cookie.php";?>
        <?php

if(isset($_GET['id'])) {
    $realise_id = $_GET['id'];
    $sql = "SELECT * FROM `collections` WHERE id = '$realise_id'";
    $rezult = mysqli_query($con, $sql);
    $tox = mysqli_fetch_assoc($rezult);
}
    $sport_type=$_SESSION['sport_type'];

    if(isset($user_id)){
        $sql_personal_checklist="SELECT * FROM custom_name_checklist WHERE user_id=$user_id";
        $res_personal_checklist=mysqli_query($con, $sql_personal_checklist);
    }

    $num_sql="SELECT * FROM base_checklist WHERE realese_id='$realise_id'";

    $sql="select * from base_checklist WHERE realese_id = '$realise_id' LIMIT 0 , 10";
    $count = 0;

    $total_rows_query=mysqli_query($con, $num_sql);
    $query=mysqli_query($con, $sql);
    $pagination= new Pagination();
    $pagination->limit=10;
    $pagination->count_rows=mysqli_num_rows($total_rows_query);


while($tox1=mysqli_fetch_assoc($query)){
        $count++;

        $content .= " <tr class='cont_tr'>
                        <td>".$count."<input class='row-id' type='hidden' value='".$tox1['id']."'/></td>
                        <td><input type='checkbox' class='check-card'></td>
                        <td class='card_number'>".$tox1['card_number']."</td>
                        <td class='card_name'>".$tox1['card_name']."</td>
                        <td class='team'>".$tox1['team']."</td>
                        <td class='parallel'>".$tox1['parallel']."</td>
                        <td class='print_run'>".$tox1['print_run']."</td>
                    </tr>";
    }

?>
        <section>
            <div class="container">
                <input type="hidden" id="favorite" data-collId="<?=$realise_id?>" data-checklistType='base_checklist'>
                <div class="row rowheight">
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 " align="center" >
                        <div class = "imgdiv">
                            <img src="images_realeses/<?php echo $tox['image']?>" class="personImg" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 " align="center" >
                        <div class="about">

                            <p><?php echo $tox['info']?></p>
                            <br>
                            <br>
                            <p>Why do we use it?ill uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        </div>
                    </div>
                </div>

            </div>

        </section>

            <!-- End Navbar -->
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 collectionNameDiv" align="center" >
                      <h2 class ="collectionName"><?php echo $tox['name_of_collection']?></h2>
                  </div>


                <div class="content">
               
                <div class="container-fluid">
                    <div class="row">


                        <div class="col-md-12">

                            <div class="card bootstrap-table">
                                <div class="card-body table-full-width table-responsive filterable sec_card_pad">
                                <div class="secfather">  
                                    <div class="pull-left search">
                                        <input class="form-control all-search" type="text" placeholder="Search">
                                    </div>
                                    <div class="bars pull-left "></div><div class=' pull-right'>
                                        <button class="px-4 py-2 select-personal-checklist mr-2" data-toggle="modal" data-target="#selectPersonalChecklist">Add cards in personal checklist</button>
                                    </div>
                                    <table id="bootstrap-table-2" class="table">
                                        <thead>
                                        <tr role="row">
                                            <th class="text-center sorting_asc" style="width: 35px;" data-field="id" rowspan="1" colspan="1" aria-label="ID">#</th>
                                            <th class="text-center sorting_asc" style="width: 35px;" data-field="selsect" rowspan="1" colspan="1" aria-label="select">Select</th>
                                            <th style="width: 214px;" data-field="Card number" class="sorting_disabled card_number" rowspan="1" colspan="1" aria-label="Card number">Card number</th>
                                            <th style="width: 223px;" data-field="Card name" class="sorting_disabled card_name" rowspan="1" colspan="1" aria-label="Card name">Card name</th>
                                            <th style="width: 241px;" data-field="Team" class="sorting_disabled team" rowspan="1" colspan="1" aria-label="Team">Team</th>
                                            <th style="width: 214px;" data-field="Parallel" class="sorting_disabled parallel" rowspan="1" colspan="1" aria-label="Parallel">Parallel</th>
                                            <th style="width: 210px;" data-field="Print run" class="sorting_disabled print_run" rowspan="1" colspan="1" aria-label="Print run">Print run</th>
                                        </tr>
                                        <tr role="row">
                                            <th class="text-center" data-field="id" rowspan="1" colspan="1"></th>
                                            <th class="text-center" data-field="select" rowspan="1" colspan="1"></th>
                                            <th  data-field="Card number" rowspan="1" colspan="1" class="card_number">
                                                <div class="input-group">
                                                    <input class="form-control inpt2" type="text" placeholder="Search" aria-label="Search" name="card_number">
                                                    <button class="btn" style="border-radius:0;">
                                                        <i class="fa fa-search btn" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </th>
                                            <th data-field="Card name" rowspan="1" colspan="1" class="card_name">
                                                <div class="input-group">
                                                    <input class="form-control inpt2" type="text" placeholder="Search" aria-label="Search" name='card_name'>
                                                    <button class="btn" style="border-radius:0;">
                                                        <i class="fa fa-search btn" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </th>
                                            <th data-field="Team" rowspan="1" colspan="1" class="team">
                                                <div class="input-group" >
                                                    <input class="form-control inpt2" type="text" placeholder="Search" aria-label="Search" name='team'>
                                                    <button class="btn" style="border-radius:0;">
                                                        <i class="fa fa-search btn" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </th>
                                            <th data-field="Parallel" rowspan="1" colspan="1" class="parallel">
                                                <div class="input-group" >
                                                    <input class="form-control inpt2" type="text" placeholder="Search" aria-label="Search" name='parallel'>
                                                    <button class="btn" style="border-radius:0;">
                                                        <i class="fa fa-search btn" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </th>
                                            <th data-field="Print run" rowspan="1" colspan="1" class="print_run">
                                                <div class="input-group">
                                                    <input class="form-control inpt2" type="text" placeholder="Search" aria-label="Search" name="print_run">
                                                    <button class="btn" style="border-radius:0;">
                                                        <i class="fa fa-search btn" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?= $content ?>
                                        </tbody>
                                    </table>
                                </div>
                                    <div>
                                        <nav aria-label="Page navigation ">
                                            <ul class="pagination justify-content-center r" style="margin-top: 10px;">
                                                <?php echo $pp = $pagination->pages(); ?>
                                            </ul>
                                        </nav>
                                    </div>

                            </div>

                        </div>
                    </div>
                </div>
                </div> 
            </div>

        <div class="modal fade" id="selectPersonalChecklist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add cards in personal checklist</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type='hidden' id='sport-type' value='<?=$sport_type?>' >
                        <div class="form-group">
                            <label>Select checklist</label>
                            <input type="hidden" value="128" name="user_id">
                            <select type="text" class="form-control namecoll" id="select_name_checklist">
                                <?php
                                while($row_pers_checklist=mysqli_fetch_assoc($res_personal_checklist)){
                                    echo "<option value=$row_pers_checklist[id]>$row_pers_checklist[name_of_checklist]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="" name="add_cards" class="banner-button float-right add-cards-personal-checklist">Add cards</button>
                    </div>
                    <div class="w-100 res-added-cards text-center my-2"></div>
                </div>
            </div>
        </div>

            <?php
                include "footer.php";
            ?>

<!-- <script src="admin/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script> -->
<script src="admin/assets/js/core/popper.min.js" type="text/javascript"></script>
<!-- <script src="admin/assets/js/core/bootstrap.min.js" type="text/javascript"></script> -->

<script src="admin/assets/js/plugins/bootstrap-table.js"></script>
<!--  DataTable Plugin -->
<script src="admin/assets/js/plugins/jquery.dataTables.min.js"></script>
<!--  Full Calendar   -->
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the bootstrap-table pages etc -->
<!-- <script src="admin/assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script> -->
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
    <script src="admin/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="js/check_list.js"></script>
    <script src="js/favorite.js"></script>
</body>
</html>