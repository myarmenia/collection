<?php
    $select_colors = "SELECT * FROM sports_type";
    $colors_result = mysqli_query($con, $select_colors);
    $colors_content = "";

    if(isset($_GET['mounth'])) {
        $this_thursday = $_GET['mounth'];
        $this_year = $_GET['year'];
        $mounth_number = $_GET['mounth_number'];
    }else {
        $this_thursday = date('F', strtotime("thursday this week"));
        $this_year = date('Y');
        $mounth_number = date('n');
    }
    $mounth_number1 = date('n');

    $this_mounth=date('F');

    while($tox = mysqli_fetch_assoc($colors_result)) {
        $colors_content .= '<div class="sport_colors">
                                <div class="sport_background" style="background: ' . $tox["background"] . '; color: ' . $tox["color"] . '">' . $tox['sport_type'] . '</div>
                                  
                                <div class="sport_color" style="background: ' . $tox["color"] . '"></div>
                            </div>';
    }

    $this_thursday_day = date('d', strtotime("thursday this week"));

    $today = date("d");

    if(!empty($_POST['choose_calendar'])){
         $choose_calendar = $_POST['choose_calendar'];
    } else if(!empty($_GET['choose_calendar'])) {
        $choose_calendar = $_GET['choose_calendar'];
    } else{
        $choose_calendar ='week';
    }
   
?>


<div class="left">
        <div class="mounth_year">
            <span data-mounth="<?= $mounth_number1 ?>"> <?= $this_mounth ?> </span>
            <span> <?= $this_year ?> </span>
        </div>
        <div class="right_icons">
            <i class="fa fa-angle-left before_select_calendar"></i>
            <i class="fa fa-angle-right after_select_calendar"></i>
        </div>
        <div class="left_calendar">
            <table class="select_calendar">
                <thead>
                    <tr class="select_calendar_days">
                        <th>M</th>
                        <th>T</th>
                        <th>W</th>
                        <th>T</th>
                        <th>F</th>
                        <th>S</th>
                        <th>S</th>
                    </tr>
                </thead>
                <tbody>
                    <?php require "select_calendar/select_calendar.php" ?>
                </tbody>
            </table>
        </div>
        <div class="sport_content">
            <?= $colors_content ?>
        </div>
    </div>
<div class="right">
    <div class="right_header">
        <div class="data_content">
            <div class="today">
                <span>TODAY</span>
                <span><?= $today ?></span>
            </div>
            <div class="control">
                <?php
                    if($choose_calendar == "week") {
                ?>
                    <i class="fa fa-angle-left before_week"></i>
                    <i class="fa fa-angle-right after_week"></i>
                <?php
                    } else if($choose_calendar == "mounth") {
                ?>
                    <i class="fa fa-angle-left before_mounth"></i>
                    <i class="fa fa-angle-right after_mounth"></i>
                <?php
                    } else if($choose_calendar == "year") {
                ?>
                    <i class="fa fa-angle-left before_year"></i>
                    <i class="fa fa-angle-right after_year"></i>
                <?php
                    } else {
                ?>
                    <i class="fa fa-angle-left before_week"></i>
                    <i class="fa fa-angle-right after_week"></i>
                <?php
                    }
                ?>

            </div>
            <div class="data">
                <input type="hidden" class="this_thursday_day" value="<?= $this_thursday_day ?>">
                <span class="mounth" data-mounth="<?= $mounth_number ?>"><?= $this_thursday ?></span>
                <span class="year"><?= $this_year ?></span>
            </div>
        </div>
        <div class="search_content">

                <?php
                    if($choose_calendar == "year") {
                ?>
                    <form action="#cal" method="post">
                        <div class="search_panel">
                            <input type="text" class="search" placeholder="Search" name="search_prov" value="<?= $search_prov ?>">
                            <input type="hidden" name="choose_calendar" value="year">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                <?php
                    }
                ?>

            <form action="select_releases_checklists.php#cal" method="post">
                <select class="calendar_type" onchange="this.form.submit()" name="choose_calendar">

                    <?php
                        if($choose_calendar == "week") {
                    ?>
                        <option value="week">Week</option>
                        <option value="mounth">Mounth</option>
                        <option value="year">Year</option>
                    <?php
                        } else if($choose_calendar == "mounth") {
                    ?>
                        <option value="mounth">Mounth</option>
                        <option value="year">Year</option>
                        <option value="week">Week</option>
                    <?php
                        } else if($choose_calendar == "year") {
                    ?>
                        <option value="year">Year</option>
                        <option value="mounth">Mounth</option>
                        <option value="week">Week</option>
                        <?php
                        } else {
                    ?>
                        <option value="week">Week</option>
                        <option value="mounth">Mounth</option>
                        <option value="year">Year</option>
                    <?php
                        }
                    ?>

                </select>
            </form>
        </div>
    </div>
    
    
   
    <div class="right_calendar">



        <?php
        if($choose_calendar == "week") {
            require "week_calendar/week_calendar.php";
        }


        else if($choose_calendar == "mounth") {
            require "mounth_calendar/mounth_calendar.php";
        }


        else if($choose_calendar == "year") {
            require "year_calendar/year_calendar.php";
        }


        else {
            require "week_calendar/week_calendar.php";
        }


        ?> 
     

    </div>
</div>

<script src="js/week_calendar.js"></script>
<script src="js/mounth_calendar.js"></script>
<script src="js/year_calendar.js"></script>
<script src="js/select_calendar.js"></script>