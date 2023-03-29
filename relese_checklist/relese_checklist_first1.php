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
                        $k1=Array($take_dates);
                    $k2 = ceil(count($k1)/6);
                    $k3 = 0;
                    $content = '';
                
                    for($i = 0; $i < $k2; $i++) {
                        
                        $content .= '<div class="card swiper-slide">';
                        for($q = 0; $q < 6; $q++) {
                            if($k3 < count($k1)){
                                $content .= '<div class="image-content">' . $k1[$k3] . '</div>';
                            }
                            $k3++;
                        }
                        $content .= '</div>';
                    }
                

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
                <div class="swiper slide-container ">
                    <div class="slide-content">
                        
                            <?= $content ?>
                        
                        <div class="swiper-button-prev swiper-navBtn"></div>
                        <div class="swiper-button-next swiper-navBtn"></div>
                    </div>
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

            <div class="d-flex innline lock1<?= $j ?>">
                <div class="d-flex boxer hh">
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
<script>
  
    $('.carusel_container>div').click(function(){
        let mychild = document.querySelectorAll('.carusel_container>div')
         for(let i = 0; i <mychild.length; i++) {
            mychild[i].style =""
        }

             if($(window).width() <= '1275'){
              
            $(this).css({
                            'height': "400px",
                            'clip-path' : 'unset',
                            'margin-top' : ' 0px',
                            'padding' : '12px',
                            'overflow-y': 'auto',

            })
                //chpoxel
            let sport_id = $(this).attr("data-id")
            let type = 'checklist';
            let user_id = $(".user_id").val()
            let a = $(this)
            let name = $(this).attr('data-append-name')
            console.log('====================================');
            console.log(name);
            console.log('====================================');
           
            $.post(
                'relese_checklist/view_sport_dates.php',
                {sport_id, type, user_id},
                function (result) {
                
                    $(a).html(name)
                    $(a).append(result)
                }
            )
        }
        if($(window).width() > '1275') {
            $(this).css({
                            "clip-path": 'polygon(20% 40%, 76% 40%, 100% 100%, 0% 100%)',
                            "padding-top": '56px',
                            "padding-left": '1px',
                            "pointer-events": 'none'
            })
        }
        if($(window).width() > '2560') {
            $(this).css({
                            "clip-path" : 'polygon(20% 0%, 80% 0%, 100% 100%, 0% 100%)',
                            "padding-top": '28px',
                            "padding-left": '1px',
                            "pointer-events": 'none'
            })
        }
    });

    let clicks = document.getElementsByClassName('click_me')
    for(let i = 0; i < clicks.length; i++) {
        clicks[i].addEventListener('click', f1)
    }

    function f1() {
        for(let q =0; q < clicks.length;q++) {
            clicks[q].addEventListener('click', f1)
        }
    }

    // carusel js
    let swiper = new Swiper(".slide-content", {
        slidesPerView: 1,
        spaceBetween: 30,
        slidesPerGroup:1,
        
        navigation: {
            prevEl: '.swiper-button-prev',
            nextEl: '.swiper-button-next',

        },
    });
        


</script>





</body>
</html>