<?php
    $sport_types= 'select * from sports_type';
    $sport_types_querry=mysqli_query($con,$sport_types);

    $take_types  = '';
    $take_types1 = '';
    $color_type  = 2 ;
    $count       = 0 ;
    $sport_id    = '';

    $dates= "SELECT * FROM dates";
    $dates_querry=mysqli_query($con,$dates);
    $take_dates='';
    
    while ($sport_types_row = mysqli_fetch_assoc($sport_types_querry)) {
        $count++;
        if($count==1){
            $active_class="active";
        }else{
            $active_class="";
        }

        $take_types.='
                                <div data-append-name="' . $sport_types_row['sport_type'] . '" data-id="' . $sport_types_row['id'] . '" class="slide_section sport'.$color_type.'" >'.$sport_types_row['sport_type'].'<div class="date_control">'.$take_dates.'</div>'.'<div class="shadow"></div></div>
                            ';
        $take_types1.='
                                <div data-append-name="' . $sport_types_row['sport_type'] . '" data-id="' . $sport_types_row['id'] . '" class="slide_section sport'.$color_type.'" >'.$sport_types_row['sport_type'].'<div class="date_control">'.$take_dates.'</div>'.'<div class="shadow"></div></div>
                            ';

        $color_type++;
    }
    while ($dates_row = mysqli_fetch_assoc($dates_querry)) {

        $take_dates.='
    
                    <div class="box1"><a class="single_date"href="single_release.php?date=' . $dates_row['data'] . '&sport_type=' . $sport_id . '">'.$dates_row['data'].'</a><i class="star_o i-click fa fa-star" data-id='.$dates_row['id'].'"></i></div>
    
        ';

    }

   // $k1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15,16,17,18,19,20];
    

?>

<div class="start">
    <div class="nachalo">
        <p class="h2">CHECKLISTS</p>
    </div>
</div>


<div class="container-fluid d-flex flex-column p-0 start2">

    <div class="carusel_container favorite_type d-flex">
        <div class="sport1">
            <input type="hidden" class="sport_type_id">
            <div class="shadow"></div>
        </div>
        <?= $take_types ?>
        <?php
        if (!empty($user_id)) {
            ?>
            <div class="sport9">My Checklists</div>
            <?php
        }
        ?>
    </div>
    <input type="hidden" value="<?= $user_id ?>" class="user_id">
    <div class="bigger_block_slider">
        <div class="eee1">
            <input type="hidden" value="checklist" class="favorite_type">

            <div class="d-flex innline lock">
                <div class="d-flex boxer ">
                </div>
            </div> 
            

            <?php 
                for($g = 1; $g < 8; $g++) {
            ?>

            <div class="d-flex innline lock<?= $g ?>" >
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</div>

<div class="start">
    <div class="nachalo">
        <p class="h2">RELEASES</p>
    </div>
</div>


<div class="container-fluid d-flex flex-column p-0 start2" >

<div class="carusel_container favorite_type d-flex">
        <div class="sport1">
            <input type="hidden" class="sport_type_id">
            <div class="shadow"></div>
        </div>
        <?= $take_types1 ?>
    </div>

    <div class="bigger_block_slider">
        <div class="eee2">
            <input type="hidden" value="release" class="favorite_type">
            <div class="d-flex innline lock">
                <div class="d-flex boxer "></div>
            </div>

            <?php 
                for($j = 1; $j < 8; $j++) {
            ?>

            <div class="d-flex innline lock1<?= $j ?>" >
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>

            <?php } ?>
        </div>
    </div>
</div>
<a name="cal"></a>
<div class="start">
    <div class="nachalo">
        <p class="h2">NEW RELEASES CALENDAR</p>
    </div>
</div>
<script src=" https://cdn.jsdelivr.net/npm/swiper@9.1.0/swiper-bundle.min.js"></script>

</body>
</html>