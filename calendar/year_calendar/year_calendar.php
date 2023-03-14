<?php

    if(isset($_POST['search_prov'])) {
        $search_prov = $_POST['search_prov'];
        $search_prov = strtolower($search_prov);
    }else {
        $search_prov = '';
    }


    $days = array("M", "T", "W", "T", "F", "S", "S");
    $ths='';
    $mounths = array(
        1 => "January",
        2 => "February",
        3 => "March",
        4 => "April",
        5 => "May",
        6 => "June",
        7 => "Juny",
        8 => "August",
        9 => "September",
        10 => "October",
        11 => "November",
        12 => "December"
    );

    for($k = 0; $k < 7; $k++) {
        $ths .= "<th class='mounths_array'>" . $days[$k] . "</th>";
    }

    $year = date('Y');
    $prev_year = $year-1;
    $p = "";

    $from_date = date("Y/m/d", strtotime("01/01/$year"));

    $to_date = date("Y/m/d", strtotime("12/31/$year"));

    $prod_days = [];
    $select_prod = "SELECT release_date FROM collections WHERE producer = '$search_prov' AND release_date BETWEEN '$from_date' AND '$to_date'";
    $prod_query = mysqli_query($con, $select_prod);

    while($prod_row = mysqli_fetch_assoc($prod_query)) {
        array_push($prod_days, $prod_row['release_date']);
    }


    for($y = 1; $y < 13; $y++) {
        $mounth = $mounths[$y];
        $last_mounth = $y - 1;

        if ( $last_mounth == 0 ) {
            $last_mounth = 12;
        }

        if ($y == 2) {
            $prev_year++;
        }

        $first_day = date('w', strtotime("$mounth $year"));
        $last_day_prew_mounth = cal_days_in_month(CAL_GREGORIAN, $last_mounth, $prev_year);

        if ( $first_day == 0 ) {
            $first_day = 7;
        }


        if($first_day > 2 ) {
            $last_day_prew_mounth -= $first_day - 2;
        }

        $q = 1;
        $f = 1;
        
        if($y == 1 || $y == 5 || $y == 9) {
            $p .= "<div class='arajin'>";
        }
        $p .= '<div class="nachalo_year">
                <div class="lll">
                    <table class="jjj"> 
                        <div class="kkkkk1">
                                <div class="name_mount1">
                                    <a href="select_releases_checklists.php?choose_calendar=mounth&mounth=' . $mounth . '&year=' . $year . '&mounth_number=' . $y . '#cal" class="year_month_names h5" style="outline: none; text-decoration: none">' . $mounth . '</a>
                                    <a href="select_releases_checklists.php?choose_calendar=mounth&mounth=' . $mounth . '&year=' . $year . '&mounth_number=' . $y . '#cal" class="year_cal_cover h5" style="outline: none; text-decoration: none">></a>
                                    
                                </div>
                        </div>
                        <div class="name_mount">
                            <h5 class="year_month_names">' . $mounth . '</h5>
                            <h5 class="year_cal_cover" >></h5>
                        </div>
                        <thead class="tr">' . $ths . '</thead>';
        $num_of_days = cal_days_in_month(CAL_GREGORIAN, $y, $year);
        // $k=($first_day*1 + $num_of_days*1 - 1) / 7;
        for ($i = 0; $i < 6; $i++) {
            $p .= '<tbody><tr>';
            for ($j = 0; $j < 7; $j++){

                $color = "";

                $y = str_pad($y,2,'0', STR_PAD_LEFT);
                $dates = str_pad($q,2,'0', STR_PAD_LEFT);

                $search_dates = date("Y-m-d", strtotime("$year-$y-$dates"));

                for($s = 0; $s < count($prod_days); $s++) {
                    if($prod_days[$s] == $search_dates) {
                        $color = "this_day";
                    }
                }

                if($i==0){
                    if($j >= $first_day-1) {

                        $p .= "<td class='number_td_pas " . $color . "'>" . $dates . "</td>";
                        $q++;
                    }
                    else {
                        $p .= "<td class='number_td' >" . $last_day_prew_mounth . "</td>";
                        $last_day_prew_mounth ++;
                    }
                }
                else{
                    if($q<=$num_of_days) {
                        $p .= "<td class='number_td_pas " . $color . "'>" . $dates . "</td>";
                    }else {
                        $dates1 = str_pad($f,2,'0', STR_PAD_LEFT);
                        $p .= "<td class='number_td'>" . $dates1 . "</td>";
                        $f++;
                    }
                    $q++;
                }
            }
            $p .="</tr></tbody>";
        }
        $p .= '</table></div></div>';

        if($y == 4 || $y == 8 || $y == 12) {
            $p .= "</div>";
        }

    }

    ?>


    <table class="calendar">
        <tbody class="calendar_body">
            <tr class="empty">
                <td></td>
            </tr>
        </tbody>
    </table>
   
        <div class="ggg">
        
            <?= $p ?>
        
        </div>

<script>

        $(".nachalo_year").click(function(){
            if($(window).width() <= '1275') {
                $(".jjj").css({"height" :"400px"})
                $(".jjj").css({"display" :"block"})
                $(".ggg").css({"height" :"150%"})
                $(".jjj").hide();
                $('.nachalo_year').css({'height':'75px'})

                $(this).css({"height" :"400px"})
                $(this).find(".jjj").show(400);

                $(this).find('.name_mount').css("display", "none")
                $(this).find('.name_mount1').css("display", "block")
            }
        });

</script> 


<!-- 

<form action="#cal" method="get"> 
                                <div class="name_mount1">
                                    <button type="submit" class="year_month_names h5" style="outline: none">' . $mounth . '</button>
                                    <button type="submit" class="year_cal_cover h5" style="outline: none">></button>
                                    <input type="hidden" value="mounth" name="choose_calendar">
                                    <input type="hidden" value="' . $mounth . '" name="mounth">
                                    <input type="hidden" value="' . $year . '" name="year">
                                    <input type="hidden" value="' . $y . '" name="mounth_number">
                                </div>
                            </form> -->