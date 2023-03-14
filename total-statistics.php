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

    $week = date("Y-m-d", strtotime('-7 day'));
    $mounth = date("Y-m-d", strtotime('-1 MONTH'));
    $quarter = date("Y-m-d", strtotime('-3 MONTH'));
    $year = date("Y-m-d", strtotime('-1 YEAR'));
    
    // total statistics
    $select_checklist = "SELECT id FROM base_checklist";
    $query_checklist = mysqli_query($con, $select_checklist);       
    $qty_checklist = mysqli_num_rows($query_checklist);

    $select_user_checklist = "SELECT id FROM custom_checklist";
    $query_user_checklist = mysqli_query($con, $select_user_checklist);       
    $qty_user_checklist = mysqli_num_rows($query_user_checklist);

    $total_checklists = $qty_checklist + $qty_user_checklist;


    $select_collection = "SELECT id FROM collections";
    $query_collections = mysqli_query($con, $select_collection);
    $qty_collections = mysqli_num_rows($query_collections);

    $select_user_collection = "SELECT id FROM custom_name_checklist";
    $query_user_collections = mysqli_query($con, $select_user_collection);
    $qty_user_collections = mysqli_num_rows($query_user_collections);

    $total_collection = $qty_collections + $qty_user_collections;


    $select_manufacture = "SELECT id, producer FROM collections GROUP BY producer";
    $query_manufacture = mysqli_query($con, $select_manufacture);
    $qty_manufacture = mysqli_num_rows($query_manufacture);

    $select_custom_checklist = "SELECT id FROM custom_checklist";
    $query_custom_checklist = mysqli_query($con, $select_custom_checklist);
    $qty_custom_checklist = mysqli_num_rows($query_custom_checklist);

    $select_users = "SELECT id FROM users";
    $query_users = mysqli_query($con, $select_users);
    $qty_users = mysqli_num_rows($query_users);

    $select_publications = "SELECT id FROM publications";
    $query_publications = mysqli_query($con, $select_publications);
    $qty_publications = mysqli_num_rows($query_publications);


    // week statistics
    $select_week_checklist = "SELECT id, Date(add_date) FROM base_checklist where add_date > '$week'";
    $query_week_checklist = mysqli_query($con, $select_week_checklist);
    $qty_week_checklist = mysqli_num_rows($query_week_checklist);

    $select_user_week_checklist = "SELECT id, Date(add_date) FROM custom_checklist where add_date > '$week'";
    $query_user_week_checklist = mysqli_query($con, $select_user_week_checklist);
    $qty_user_week_checklist = mysqli_num_rows($query_user_week_checklist);

    $total_week_checklist = $qty_week_checklist + $qty_user_week_checklist;
    

    $select_week_collection = "SELECT id, Date(add_date) FROM collections where add_date > '$week'";
    $query_week_collections = mysqli_query($con, $select_week_collection);
    $qty_week_collections = mysqli_num_rows($query_week_collections);

    $select_user_week_collection = "SELECT id, Date(date_of_creation) FROM custom_name_checklist where date_of_creation > '$week'";
    $query_user_week_collections = mysqli_query($con, $select_user_week_collection);
    $qty_user_week_collections = mysqli_num_rows($query_user_week_collections);

    $total_week_collection = $qty_week_collections + $qty_user_week_collections;



    $select_week_registreated_users = "SELECT id, Date(`date`) FROM users where `date` > '$week'";
    $query_week_registreated_users = mysqli_query($con, $select_week_registreated_users);
    $qty_week_registreated_users = mysqli_num_rows($query_week_registreated_users);

    $select_week_online_users = "SELECT id, Date(`login_date`) FROM users where `login_date` > '$week'";
    $query_week_online_users = mysqli_query($con, $select_week_online_users);
    $qty_week_online_users = mysqli_num_rows($query_week_online_users);

    $select_week_publications = "SELECT id, Date(`published_date`) FROM publications where `published_date` > '$week'";
    $query_week_publications = mysqli_query($con, $select_week_publications);
    $qty_week_publications = mysqli_num_rows($query_week_publications);


    // mounth statistics
    $select_mounth_checklist = "SELECT id, Date(add_date) FROM base_checklist where add_date > '$month'";
    $query_mounth_checklist = mysqli_query($con, $select_mounth_checklist);
    $qty_mounth_checklist = mysqli_num_rows($query_mounth_checklist);

    $select_user_mounth_checklist = "SELECT id, Date(add_date) FROM custom_checklist where add_date > '$mounth'";
    $query_user_mounth_checklist = mysqli_query($con, $select_user_mounth_checklist);
    $qty_user_mounth_checklist = mysqli_num_rows($query_user_mounth_checklist);

    $total_mounth_checklist = $qty_mounth_checklist + $qty_user_mounth_checklist;


    $select_mounth_collection = "SELECT id, Date(add_date) FROM collections where add_date > '$mounth'";
    $query_mounth_collections = mysqli_query($con, $select_mounth_collection);
    $qty_mounth_collections = mysqli_num_rows($query_mounth_collections);

    $select_user_mounth_collection = "SELECT id, Date(date_of_creation) FROM custom_name_checklist where date_of_creation > '$mounth'";
    $query_user_mounth_collections = mysqli_query($con, $select_user_mounth_collection);
    $qty_user_mounth_collections = mysqli_num_rows($query_user_mounth_collections);

    $total_mounth_collection = $qty_mounth_collections + $qty_user_mounth_collections;


    $select_mounth_registreated_users = "SELECT id, Date(`date`) FROM users where `date` > '$mounth'";
    $query_mounth_registreated_users = mysqli_query($con, $select_mounth_registreated_users);
    $qty_mounth_registreated_users = mysqli_num_rows($query_mounth_registreated_users);

    $select_mounth_online_users = "SELECT id, Date(`login_date`) FROM users where `login_date` > '$mounth'";
    $query_mounth_online_users = mysqli_query($con, $select_mounth_online_users);
    $qty_mounth_online_users = mysqli_num_rows($query_mounth_online_users);

    $select_mounth_publications = "SELECT id, Date(`published_date`) FROM publications where `published_date` > '$mounth'";
    $query_mounth_publications = mysqli_query($con, $select_mounth_publications);
    $qty_mounth_publications = mysqli_num_rows($query_mounth_publications);


    // quarter statistics
    $select_quarter_checklist = "SELECT id, Date(add_date) FROM base_checklist where add_date > '$quarter'";
    $query_quarter_checklist = mysqli_query($con, $select_quarter_checklist);
    $qty_quarter_checklist = mysqli_num_rows($query_quarter_checklist);

    $select_user_quarter_checklist = "SELECT id, Date(add_date) FROM custom_checklist where add_date > '$quarter'";
    $query_user_quarter_checklist = mysqli_query($con, $select_user_quarter_checklist);
    $qty_user_quarter_checklist = mysqli_num_rows($query_user_quarter_checklist);

    $total_quarter_checklist = $qty_quarter_checklist + $qty_user_quarter_checklist;


    $select_quarter_collection = "SELECT id, Date(add_date) FROM collections where add_date > '$quarter'";
    $query_quarter_collections = mysqli_query($con, $select_quarter_collection);
    $qty_quarter_collections = mysqli_num_rows($query_quarter_collections);

    $select_user_quarter_collection = "SELECT id, Date(date_of_creation) FROM custom_name_checklist where date_of_creation > '$quarter'";
    $query_user_quarter_collections = mysqli_query($con, $select_user_quarter_collection);
    $qty_user_quarter_collections = mysqli_num_rows($query_user_quarter_collections);

    $total_quarter_collection = $qty_quarter_collections + $qty_user_quarter_collections;


    $select_quarter_registreated_users = "SELECT id, Date(`date`) FROM users where `date` > '$quarter'";
    $query_quarter_registreated_users = mysqli_query($con, $select_quarter_registreated_users);
    $qty_quarter_registreated_users = mysqli_num_rows($query_quarter_registreated_users);

    $select_quarter_online_users = "SELECT id, Date(`login_date`) FROM users where `login_date` > '$quarter'";
    $query_quarter_online_users = mysqli_query($con, $select_quarter_online_users);
    $qty_quarter_online_users = mysqli_num_rows($query_quarter_online_users);

    $select_quarter_publications = "SELECT id, Date(`published_date`) FROM publications where `published_date` > '$quarter'";
    $query_quarter_publications = mysqli_query($con, $select_quarter_publications);
    $qty_quarter_publications = mysqli_num_rows($query_quarter_publications);

    // year statistics
    $select_year_checklist = "SELECT id, Date(add_date) FROM base_checklist where add_date > '$year'";
    $query_year_checklist = mysqli_query($con, $select_year_checklist);
    $qty_year_checklist = mysqli_num_rows($query_year_checklist);

    $select_user_year_checklist = "SELECT id, Date(add_date) FROM custom_checklist where add_date > '$year'";
    $query_user_year_checklist = mysqli_query($con, $select_user_year_checklist);
    $qty_user_year_checklist = mysqli_num_rows($query_user_year_checklist);

    $total_year_checklist = $qty_year_checklist + $qty_user_year_checklist;

    $select_year_collection = "SELECT id, Date(add_date) FROM collections where add_date > '$year'";
    $query_year_collections = mysqli_query($con, $select_year_collection);
    $qty_year_collections = mysqli_num_rows($query_year_collections);
    
    $select_user_year_collection = "SELECT id, Date(date_of_creation) FROM custom_name_checklist where date_of_creation > '$year'";
    $query_user_year_collections = mysqli_query($con, $select_user_year_collection);
    $qty_user_year_collections = mysqli_num_rows($query_user_year_collections);

    $total_year_collection = $qty_year_collections + $qty_user_year_collections;

    $select_year_registreated_users = "SELECT id, Date(`date`) FROM users where `date` > '$year'";
    $query_year_registreated_users = mysqli_query($con, $select_year_registreated_users);
    $qty_year_registreated_users = mysqli_num_rows($query_year_registreated_users);

    $select_year_online_users = "SELECT id, Date(`login_date`) FROM users where `login_date` > '$year'";
    $query_year_online_users = mysqli_query($con, $select_year_online_users);
    $qty_year_online_users = mysqli_num_rows($query_year_online_users);

    $select_year_publications = "SELECT id, Date(`published_date`) FROM publications where `published_date` > '$year'";
    $query_year_publications = mysqli_query($con, $select_year_publications);
    $qty_year_publications = mysqli_num_rows($query_year_publications);
    

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/my_checklist.css">
<link rel="stylesheet" type="text/css" href="css/statistics.css">

</head>
<body>

    <?php include "cookie.php"; ?>
    <section class="hide_div"></section>
    <section class="section1 my-5">
    <section class="section-collection">
        <div class="parent" id="parent-first">
            <div class="start">
                <div class="nachalo">
                    <p class="p">total statistics</p>
                </div>
            </div>
            <div class="child">
                <div class="blue">
                    <div class="icon-blue icon">
                        <img src="admin/statistics_img/Group 1200.png" alt="">
                    </div>
                    <div class="total-cards total">
                        <div class="number-blue number"><?= $total_checklists ?></div>
                        <div class="text-cards text">total cards</div>

                    </div>
                </div>
                <div class="red">
                    <div class="icon-red icon">
                        <img src="admin/statistics_img/Group 1196.png" alt="">
                    </div>
                    <div class="total-colections total">
                        <div class="naumber-red number"><?= $total_collection ?></div>
                        <div class="text-colections text">total collections</div>
                    </div>
                </div>
                <div class="aqua">
                    <div class="icon-aqua icon">
                        <img src="admin/statistics_img/Frame.png" alt="">
                    </div>
                    <div class="manufacture-checklists total">
                        <div class="naumber-aqua number"><?= $qty_manufacture ?></div>
                        <div class="text-manufacture text">manufacture checklists</div>
                    </div>
                </div>
                <div class="yellow">
                    <div class="icon-yellow icon">
                        <img src="admin/statistics_img/Group 973.png" alt="">
                    </div>
                    <div class="user-created-checklists total">
                        <div class=" naumber-yellow number"><?= $qty_custom_checklist ?></div>
                    <div class="text-created-checklists text">user created checklists</div>
                </div>
                  </div>

                <div class="green">
                    <div class="icon-green icon">
                        <img src="admin/statistics_img/Group 1206.png" alt="">
                    </div>
                    <div class="total-registered-users total">
                        <div class="naumber-green number"><?= $qty_users?></div>
                        <div class="text-registered-users text">total registered users</div>
                    </div>
                </div>
                <div class="grey">
                    <div class="icon-grey icon">
                        <img src="admin/statistics_img/Vector.png" alt="">
                    </div>
                    <div class="total-rublications total">
                        <div class="naumber-grey number"><?= $qty_publications?></div>
                        <div class="text-rublications text">total publications</div>
                    </div>
                </div>
            </div>
        </div>
 
        <div class="parent-total">
            <div class="parent" id="parent-first">
                <div class="start">
                    <div class="nachalo">
                        <p class="p">last week statistics</p>
                    </div>
                </div>
                <div class="child">
                    <div class="blue">
                        <div class="icon-blue icon">
                            <img src="admin/statistics_img/Group 1200.png" alt="">
                        </div>
                        <div class="total-cards total">
                            <div class="number-blue number"><?= $total_week_checklist ?></div>
                            <div class="text-cards text">total cards added</div>

                        </div>
                    </div>
                    <div class="red">
                        <div class="icon-red icon">
                            <img src="admin/statistics_img/Group 1196.png" alt="">
                        </div>
                        <div class="total-colections total">
                            <div class="naumber-red number "><?= $total_week_collection ?></div>
                            <div class="text-colections text">total collections added</div>
                        </div>
                    </div>
                    <div class="aqua">
                        <div class="icon-aqua icon">
                            <img src="admin/statistics_img/Group 973.png" alt="">
                        </div>
                        <div class="manufacture-checklists total">
                            <div class="naumber-aqua number"><?= $total_week_collection ?></div>
                            <div class="text-manufacture text">total checklists added</div>
                        </div>
                    </div>
                    <div class="yellow">
                        <div class="icon-yellow icon">
                            <img src="admin/statistics_img/Group 1206.png" alt="">
                        </div>
                        <div class="user-created-checklists total">
                            <div class="naumber-yellow number"><?= $qty_week_registreated_users ?></div>
                            <div class="text-created-checklists text">total registered users</div>
                        </div>
                    </div>
                    <div class="green">
                        <div class="icon-green icon">
                            <img src="admin/statistics_img/Group 1217.png" alt="">
                        </div>
                        <div class="total-registered-users total">
                            <div class="naumber-green number"><?= $qty_week_online_users ?></div>
                            <div class="text-registered-users text">total users who were online</div>
                        </div>
                    </div>
                    <div class="grey">
                        <div class="icon-grey icon">
                            <img src="admin/statistics_img/Vector.png" alt="">

                        </div>
                        <div class="total-rublications total">
                            <div class="naumber-grey number"><?= $qty_week_publications ?></div>
                            <div class="text-rublications text"> total publications added</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="parent" id="parent-first">
                <div class="start">
                    <div class="nachalo">
                        <p class="p">last month statistics</p>
                    </div>
                </div>
                <div class="child">
                    <div class="blue">
                        <div class="icon-blue icon">
                            <img src="admin/statistics_img/Group 1200.png" alt="">
                        </div>
                        <div class="total-cards total">
                            <div class="number-blue number"><?= $total_mounth_checklist ?></div>
                            <div class="text-cards text">total cards added</div>

                        </div>
                    </div>
                    <div class="red">
                        <div class="icon-red icon">
                            <img src="admin/statistics_img/Group 1196.png" alt="">
                        </div>
                        <div class="total-colections total">
                            <div class="naumber-red number"><?= $total_mounth_collection ?></div>
                            <div class="text-colections text">total callections added</div>
                        </div>
                    </div>
                    <div class="aqua">
                        <div class="icon-aqua icon">
                            <img src="admin/statistics_img/Group 973.png" alt="">
                        </div>
                        <div class="manufacture-checklists total">
                            <div class="naumber-aqua number"><?= $total_mounth_collection ?></div>
                            <div class="text-manufacture text">total checklists added</div>
                        </div>
                    </div>
                    <div class="yellow">
                        <div class="icon-yellow icon">
                            <img src="admin/statistics_img/Group 1206.png" alt="">
                        </div>
                        <div class="user-created-checklists total">
                            <div class="naumber-yellow number"><?= $qty_mounth_registreated_users ?></div>
                            <div class="text-created-checklists text">total registered users</div>
                        </div>
                    </div>
                    <div class="green">
                        <div class="icon-green icon">
                            <img src="admin/statistics_img/Group 1217.png" alt="">
                        </div>
                        <div class="total-registered-users total">
                            <div class="naumber-green number"><?= $qty_mounth_online_users ?></div>
                            <div class="text-registered-users text">total users who were online</div>
                        </div>
                    </div>
                    <div class="grey">
                        <div class="icon-grey icon">
                            <img src=" admin/statistics_img/Vector.png" alt="">

                        </div>
                        <div class="total-rublications total">
                            <div class="naumber-grey number"><?= $qty_mounth_publications ?></div>
                            <div class="text-rublications text"> total publications added</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="parent-total">
            <div class="parent" id="parent-first">
                <div class="start">
                    <div class="nachalo">
                        <p class="p">Last quarter statistics</p>
                    </div>
                </div>
                <div class="child">
                    <div class="blue">
                        <div class="icon-blue icon">
                            <img src="admin/statistics_img/Group 1200.png" alt="">
                        </div>
                        <div class="total-cards total">
                            <div class=" number-blue number"><?= $total_quarter_checklist ?></div>
                        <div class="text-cards text">total cards added</div>

                    </div>
                </div>
                <div class="red">
                    <div class="icon-red icon">
                        <img src="admin/statistics_img/Group 1196.png" alt="">
                    </div>
                    <div class="total-colections total">
                        <div class="naumber-red number"><?= $total_quarter_collection ?></div>
                        <div class="text-colections text">total collections added</div>
                    </div>
                </div>
                <div class="aqua">
                    <div class="icon-aqua icon">
                        <img src="admin/statistics_img/Group 973.png" alt="">
                    </div>
                    <div class="manufacture-checklists total">
                        <div class="naumber-aqua number"><?= $total_quarter_collection ?></div>
                        <div class="text-manufacture text">total checklists added</div>
                    </div>
                </div>
                <div class="yellow">
                    <div class="icon-yellow icon">
                        <img src="admin/statistics_img/Group 1206.png" alt="">
                    </div>
                    <div class="user-created-checklists total">
                            <div class=" naumber-yellow number"><?= $qty_quarter_registreated_users ?></div>
                    <div class="text-created-checklists text">total registered users</div>
                </div>
            </div>
            <div class="green">
                <div class="icon-green icon">
                    <img src="admin/statistics_img/Group 1217.png" alt="">
                </div>
                <div class="total-registered-users total">
                    <div class="naumber-green number"><?= $qty_quarter_online_users ?></div>
                    <div class="text-registered-users text">total users who were online</div>
                </div>
            </div>
            <div class="grey">
                <div class="icon-grey icon">
                    <img src="admin/statistics_img/Vector.png" alt="">

                </div>
                <div class="total-rublications total">
                    <div class=" naumber-grey number"><?= $qty_quarter_publications ?></div>
                <div class="text-rublications text"> total publications added</div>
            </div>
        </div>
        </div>
        </div>
        <div class="parent" id="parent-first">
            <div class="start">
                <div class="nachalo">
                    <p class="p">last year statistics</p>
                </div>
            </div>
            <div class="child">
                <div class="blue">
                    <div class="icon-blue icon">
                        <img src="admin/statistics_img/Group 1200.png" alt="">
                    </div>
                    <div class="total-cards total">
                        <div class="number-blue number"><?= $total_year_checklist ?></div>
                        <div class="text-cards text">total cards added</div>

                    </div>
                </div>
                <div class="red">
                    <div class="icon-red icon">
                        <img src="admin/statistics_img/Group 1196.png" alt="">
                    </div>
                    <div class="total-colections total">
                        <div class="naumber-red number"><?= $total_year_collection ?></div>
                        <div class="text-colections text">total callections added</div>
                    </div>
                </div>
                <div class="aqua">
                    <div class="icon-aqua icon">
                        <img src="admin/statistics_img/Group 973.png" alt="">
                    </div>
                    <div class="manufacture-checklists total">
                        <div class="naumber-aqua number"><?= $total_year_collection ?></div>
                        <div class="text-manufacture text">total checklists added</div>
                    </div>
                </div>
                <div class="yellow">
                    <div class="icon-yellow icon">
                        <img src="admin/statistics_img/Group 1206.png" alt="">
                    </div>
                    <div class="user-created-checklists total">
                        <div class="naumber-yellow number"><?= $qty_year_registreated_users ?></div>
                        <div class="text-created-checklists text">total registered users</div>
                    </div>
                </div>
                <div class="green">
                    <div class="icon-green icon">
                        <img src="admin/statistics_img/Group 1217.png" alt="">
                    </div>
                    <div class="total-registered-users total">
                        <div class="naumber-green number"><?= $qty_year_online_users ?></div>
                        <div class="text-registered-users text">total users who were online</div>
                    </div>
                </div>
                <div class="grey">
                    <div class="icon-grey icon">
                        <img src="admin/statistics_img/Vector.png" alt="">

                    </div>
                    <div class="total-rublications total">
                        <div class="naumber-grey number"><?= $qty_year_publications ?></div>
                        <div class="text-rublications text"> total publications added</div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php
            if($user_id != ""){
                include "Statics/total-statics.php" 
        ?>
            <div class="parent">
                <div class="start">
                    <div class="nachalo">
                        <p class="p">my statistics</p>
                    </div>
                </div>
            </div>

            <div class="statics_diagrama" id="stats">

                <? 
                    if(count($publications_published) > 0) {
                ?>

                <div class="statistics">
                    <canvas id="publications_published"></canvas>
                </div> 

                <? 
                    }

                    if(count($public_checklist_statics_array) > 0) {
                ?>

                <div class="statistics">
                    <canvas id="public_checklist_statics_array"></canvas>
                </div> 

                <? 
                    }
                    
                    if(count($privite_checklist_statics_array) > 0) {
                ?>

                <div class="statistics">
                    <canvas id="privite_checklist_statics_array"></canvas>
                </div> 

                <? 
                    }
                    
                    if(count($total_cards) > 0) {
                ?>

                <div class="statistics">
                    <canvas id="total_cards"></canvas>
                </div> 

                <? 
                    }
                    
                    if(count($total_collection1) > 0) {
                ?>

                <div class="statistics">
                    <canvas id="total_collection1"></canvas>
                </div> 

                <? 
                    }
                ?>

            </div>


        <?php
            }   
        ?>

    </section>
    </section>
    
   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
       
        
        // start publications_published 
        var publications_published = <?php echo(json_encode($publications_published)) ?>;
        if(publications_published.length > 0) {

            var labels = [ ];
            for(let i = 0; i < publications_published.length; i++) {
                labels[i] = publications_published[i].label
            }
            var data = {
                labels: [ ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [],
                    backgroundColor: [
                        '#FAAE68',
                        '#CB203A',
                        '#71B07B',
                        '#71A6B0'
                    ],
                    hoverOffset: 6
                }]
            };
            for(let i = 0; i < publications_published.length; i++) {
                data.datasets[0].data[i] = publications_published[i].y
                data.labels[i] = publications_published[i].label 
            }
            var config = {
                type: 'doughnut',
                data: data,
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: "Total Publications Published",
                        },
                        legend: {
                            position: "bottom",
                            align: "start"
                        }
                    } 
                }
            };
            var myChart = new Chart(
                document.getElementById('publications_published'),
                config
            );
        }
        // end publications_published

        // -----------------------------------------------------------------------------------------------------

        // start public_checklist_statics_array     

        var publications_published = <?php echo(json_encode($public_checklist_statics_array)); ?>;
        if(publications_published.length > 0) {
            var labels = [ ];
            for(let i = 0; i < publications_published.length; i++) {
                labels[i] = publications_published[i].label
            }
            var data = {
                labels: [ ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [],
                    backgroundColor: [
                        '#FAAE68',
                        '#CB203A',
                        '#71B07B',
                        '#71A6B0'
                    ],
                    hoverOffset: 6
                }]
            };
            for(let i = 0; i < publications_published.length; i++) {
                data.datasets[0].data[i] = publications_published[i].y
                data.labels[i] = publications_published[i].label 
            }
            var config = {
                type: 'doughnut',
                data: data,
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: "Total Checklists Added",
                        },
                        legend: {
                            position: "bottom",
                            align: "start"
                        }
                    } 
                }
            };
            var myChart = new Chart(
                document.getElementById('public_checklist_statics_array'),
                config
            );
        }

        // end public_checklist_statics_array

        // -----------------------------------------------------------------------------------------------------

        // start privite_checklist_statics_array

        var publications_published = <?php echo(json_encode($privite_checklist_statics_array)); ?>;
        if(publications_published.length > 0) {
            var labels = [ ];
            for(let i = 0; i < publications_published.length; i++) {
                labels[i] = publications_published[i].label
            }
            var data = {
                labels: [ ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [],
                    backgroundColor: [
                        '#FAAE68',
                        '#CB203A',
                        '#71B07B',
                        '#71A6B0'
                    ],
                    hoverOffset: 6
                }]
            };
            for(let i = 0; i < publications_published.length; i++) {
                data.datasets[0].data[i] = publications_published[i].y
                data.labels[i] = publications_published[i].label 
            }
            var config = {
                type: 'doughnut',
                data: data,
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: "Total Custom Checklists Created ",
                        },
                        legend: {
                            position: "bottom",
                            align: "start"
                        }
                    } 
                }
            };
            var myChart = new Chart(
                document.getElementById('privite_checklist_statics_array'),
                config
            );
        }

        // end privite_checklist_statics_array

        // -----------------------------------------------------------------------------------------------------
        
        // start total_cards

        var publications_published = <?php echo(json_encode($total_cards)); ?>;
        if(publications_published.length > 0) {
            var labels = [ ];
            for(let i = 0; i < publications_published.length; i++) {
                labels[i] = publications_published[i].label
            }
            var data = {
                labels: [ ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [],
                    backgroundColor: [
                        '#FAAE68',
                        '#CB203A',
                        '#71B07B',
                        '#71A6B0'
                    ],
                    hoverOffset: 6
                }]
            };
            for(let i = 0; i < publications_published.length; i++) {
                data.datasets[0].data[i] = publications_published[i].y
                data.labels[i] = publications_published[i].label 
            }
            var config = {
                type: 'doughnut',
                data: data,
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: "Total Cards Added",
                        },
                        legend: {
                            position: "bottom",
                            align: "start"
                        }
                    } 
                }
            };
            var myChart = new Chart(
                document.getElementById('total_cards'),
                config
            );
        }

        // end total_cards

        // -----------------------------------------------------------------------------------------------------

        // start total_collection

        var publications_published = <?php echo(json_encode($total_collection1)); ?>;
        if(publications_published.length > 0) {
            var labels = [ ];
            for(let i = 0; i < publications_published.length; i++) {
                labels[i] = publications_published[i].label
            }
            var data = {
                labels: [ ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [],
                    backgroundColor: [
                        '#FAAE68',
                        '#CB203A',
                        '#71B07B',
                        '#71A6B0'
                    ],
                    hoverOffset: 6
                }]
            };
            for(let i = 0; i < publications_published.length; i++) {
                data.datasets[0].data[i] = publications_published[i].y
                data.labels[i] = publications_published[i].label 
            }
            var config = {
                type: 'doughnut',
                data: data,
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: "Total Collections Added",
                        },
                        legend: {
                            position: "bottom",
                            align: "start"
                        }
                    } 
                }
            };
            var myChart = new Chart(
                document.getElementById('total_collection1'),
                config
            );
        }

        // end total_collection

        Chart.defaults.font.size = 18


      </script>



<?php include "footer.php ";?>



</body>
</html>         