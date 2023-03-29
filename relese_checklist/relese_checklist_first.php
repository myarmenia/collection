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
                                <div data-id="' . $sport_types_row['id'] . '" class="sport'.$color_type.'" onClick="slide('. "'" .$sport_types_row['sport_type']. "'"  .')">'.$sport_types_row['sport_type'].'<div class="date_control">'.$take_dates.'</div>'.'<div class="shadow"></div></div>
                            ';
        $take_types1.='
                                <div data-id="' . $sport_types_row['id'] . '" class="sport'.$color_type.'" onClick="slide1('. "'" .$sport_types_row['sport_type']. "'"  .')">'.$sport_types_row['sport_type'].'<div class="date_control">'.$take_dates.'</div>'.'<div class="shadow"></div></div>
                            ';

        $color_type++;
    }
    while ($dates_row = mysqli_fetch_assoc($dates_querry)) {

        $take_dates.='

                    <div class="box1"><a class="single_date"href="single_release.php?date=' . $dates_row['data'] . '&sport_type=' . $sport_id . '">'.$dates_row['data'].'</a><i class="star_o i-click fa fa-star" data-id='.$dates_row['id'].'"></i></div>

                    ';
    }


?>

<div class="start">
    <div class="nachalo">
        <p class="h2">CHECKLISTS</p>
    </div>
</div>
<div class="container-fluid d-flex flex-column p-0 start2">
    <div class="mayr favorite_type d-flex">
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
        <div class="eee">
            <input type="hidden" value="checklist" class="favorite_type">
            <div class="d-flex innline lock">
                <div class="d-flex boxer ">
                </div>
            </div>
            <div class="d-flex innline lock1" >
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>
            <div class="d-flex innline lock2" >
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>
            <div class="d-flex innline lock3" >
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>
            <div class="d-flex innline lock4">
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>
            <div class="d-flex innline lock5" >
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>
            <div class="d-flex innline lock6">
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>
            <div class="d-flex innline lock7" >
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="start">
    <div class="nachalo">
        <p class="h2">RELEASES</p>
    </div>
</div>
<div class="container-fluid d-flex flex-column p-0 start2" >
    <div class="mayr1 favorite_type d-flex">
        <div class="sport1"></div>
        <input type="hidden" class="sport_type_id">
        <?= $take_types1 ?>
    </div>
    <div class="bigger_block_slider">
        <div class="eee1">
            <input type="hidden" value="release" class="favorite_type">
            <div class="d-flex innline lock">
                <div class="d-flex boxer ">
                </div>
            </div>
            <div class="d-flex innline lock11">
                <div class="d-flex boxer hh">
                    <?= $take_dates ?>
                </div>
            </div>
            <div class="d-flex innline lock12">
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>
            <div class="d-flex innline lock13">
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>
            <div class="d-flex innline lock14">
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>
            <div class="d-flex innline lock15">
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>
            <div class="d-flex innline lock16" >
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>
            <div class="d-flex innline lock17">
                <div class="d-flex boxer ">
                    <?= $take_dates ?>
                </div>
            </div>
        </div>
    </div>
</div>
<a name="cal"></a>
<div class="start">
    <div class="nachalo">
        <p class="h2">NEW RELEASES CALENDAR</p>
    </div>
</div>
<script>
    $('.mayr>div').click(function(event){

        let mychild = document.querySelector('.mayr')
        for(let i = 0; i < mychild.children.length; i++) {
            mychild.children[i].style = {}
        }
        let sport_type_id = $(this).attr("data-id")
        $(this).parents('.start2').find('.sport_type_id').val(sport_type_id)
        if($(this).attr('class') != "sport1") {
            let name = $(this).text()
            name = name.split(" ")
            if($(window).width() <= '1275'){
                $(this).css({
                              'height': "400px",
                              'clip-path' : 'unset',
                              'margin-top' : ' 0px',
                              'padding-top' : '12px',
                              'display' : 'flex',
                              'flex-direction' : 'column',
                              'align-items' : 'center'
                })
                let sport_id = $(this).attr("data-id")
                let type = 'checklist';
                let user_id = $(".user_id").val()
                let a = $(this)
                $.post(
                    'relese_checklist/view_sport_dates.php',
                    {sport_id, type, user_id},
                    function (result) {
                        $(a).html(name[0])
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
        }
    });
    $('.mayr1>div').click(function(event){
        let mychild = document.querySelector('.mayr1')
        for(let i = 0; i < mychild.children.length; i++) {
            mychild.children[i].style = {}
        }
        let sport_type_id = $(this).attr("data-id")
        $(this).parents('.start2').find('.sport_type_id').val(sport_type_id)

        if($(this).attr('class') != "sport1") {
            if($(window).width() <= '1275'){
                $(this).css({
                    'height': "400px",
                              'clip-path' : 'unset',
                              'margin-top' : ' 0px',
                              'padding-top' : '12px',
                              'display' : 'flex',
                              'flex-direction' : 'column',
                              'align-items' : 'center'
                })
                let sport_id = $(this).attr("data-id")
                let type = 'release';
                let user_id = $(".user_id").val()
                let a = $(this)
                $.post(
                    'relese_checklist/view_sport_dates.php',
                    {sport_id, type, user_id},
                    function (result) {
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
    $(".mayr.date_control").click(function () {
        console.log('box');
    })
    function slide(params) {
        let a = $('.eee')

        // let q = $(event.target).attr("data-id")
        // a.removeClass();
        // a.addClass("eee slide" + q);
        switch (params) {
            case "Baseball":
                a.removeClass();
                a.addClass("eee slide");
                break;
            case "Football":
                a.removeClass();
                a.addClass("eee slide2");
                break;
            case "Basketball":
                a.removeClass();
                a.addClass("eee slide3");
                break;
            case "Hockey":
                a.removeClass();
                a.addClass("eee slide4");
                break;
            case "Soccer":
                a.removeClass();
                a.addClass("eee slide5");
                break;
            case "Fighting":
                a.removeClass();
                a.addClass("eee slide6");
                break;
            case "Autosport":
                a.removeClass();
                a.addClass("eee slide7");
                break;
            default:
                console.log("Sorry, we are out of ");
        }
        let user_id = $(".user_id").val()
        let sport_id = $(event.target).attr("data-id")
        let type = 'checklist';
        $.post(
            'relese_checklist/view_sport_dates.php',
            {sport_id, type, user_id},
            function (result) {
                $('.lock' + sport_id + " .boxer").html(result)
            }
        )

    }
    function slide1(params) {
        let a = $('.eee1')
        switch (params) {
            case "Baseball":
                a.removeClass();
                a.addClass("eee1 slide");
                break;
            case "Football":
                a.removeClass();
                a.addClass("eee1 slide2");
                break;
            case "Basketball":
                a.removeClass();
                a.addClass("eee1 slide3");
                break;
            case "Hockey":
                a.removeClass();
                a.addClass("eee1 slide4");
                break;
            case "Soccer":
                a.removeClass();
                a.addClass("eee1 slide5");
                break;
            case "Fighting":
                a.removeClass();
                a.addClass("eee1 slide6");
                break;
            case "Autosport":
                a.removeClass();
                a.addClass("eee1 slide7");
                break;
            default:
                console.log("Sorry, we are out of");
        }
        let user_id = $(".user_id").val()
        if(user_id != '') {
            let sport_id = $(event.target).attr("data-id")

            let type = 'release';
            $.post(
                'relese_checklist/view_sport_dates.php',
                {sport_id, type, user_id},
                function (result) {
                    $('.lock1' + sport_id + " .boxer").html(result)
                }
            )
        }
    }
    $('body').on('click',".i-click",function() {
        let date_id = $(this).attr('data-id')
        let sport_id =  $(this).parents('.start2').find(".sport_type_id").val()
        let favorite_type = $(this).parents('.bigger_block_slider').find("input.favorite_type").val()
        let user_id = $(".user_id").val()
        let action = ''
        let parents_class = $(this).parents('.start2').find(".favorite_type")
        let parents_type = ''

        if(user_id != "") {

            if($(parents_class).hasClass('mayr')) {
                parents_type = 'checklists'
            }else if($(parents_class).hasClass('mayr1')){
                parents_type = 'release'
            }

            if($(this).css('color') == "rgb(255, 255, 255)") {
                $(this).css('color', "gold")
                action = 'add'
            }else {
                $(this).css('color', "white")
                action = 'delete'
            }
            $.ajax({
                method:"POST",
                url: "rate_test.php",
                data:{
                      date_id,
                      sport_id,
                      favorite_type,
                      action,
                      user_id,
                      parents_type
                },
                success:function(r){
                    console.log(r)
                }
            });
        } else {
            alert("You must be registered to perform this transaction. Please register")
            location.assign('login-register.php')
        }
    });


    $('.sport9').click(function () {
        location.assign('my_checklist.php')

    })



</script>

<style>
    .bigger_block_slider{
        width: 81vw;
        overflow:hidden;
    }
</style>
