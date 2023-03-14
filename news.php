<?php
    include "header.php";
    include "config/con1.php";
    include "classes/pagination.php";

    $news_type = $_GET["news_type"];
?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/news.css">
<link rel="stylesheet" href="css/pagination.css">
</head>
<body>
<?php include "cookie.php"; ?>
<section class=" p-2 news">
    <div class="container-fluid">
        <div class="d-flex flex-wrap justify-content-center news_filter">
            <div class="mx-auto news_first">
                <h6 class="my-2">Apply filters</h6>
                <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0  ">
                            <button class="w-100 btn btn-link collapsed d-flex justify-content-between" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span>Period</span>
                                <i class='fa fa-caret-down mt-2'></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <p><input type="checkbox" name="period" value="Last week" class="period"><span class="ml-1">Last week</span></p>
                            <p><input type="checkbox" name="period" value="Last months" class="period"><span class="ml-1">Last months</span></p>
                            <p><input type="checkbox" name="period" value="Last 3 months" class="period"><span class="ml-1">Last 3 months</span></p>
                            <p><input type="checkbox" name="period" value="Last 6 months" class="period"><span class="ml-1">Last 6 months</span></p>
                            <p><input type="checkbox" name="period" value="All news" class="period"><span class="ml-1">All news</span></p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="w-100 btn btn-link collapsed d-flex justify-content-between" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span>Sports</span>
                                <i class='fa fa-caret-down mt-2'></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                        <?php
                            $sql="SELECT * FROM sports_type";
                            $query=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_assoc($query)){

                            echo  "<p><input type='checkbox' value='".$row['sport_type']."' class='sport_type'><span class='ml-1'>".$row['sport_type']."</span></p>";

                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="w-100 btn btn-link collapsed d-flex justify-content-between" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <span>Manufacture</span>
                            <i class='fa fa-caret-down mt-2'></i>
                        </button>
                    </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                            <p><input type="checkbox" value="Upper Deck" class="producer"><span class="ml-1">Upper Deck</span></p>
                            <p><input type="checkbox" value="Panini" class="producer"><span class="ml-1">Panini</span></p>
                            <p><input type="checkbox" value="Topps" class="producer"><span class="ml-1">Topps</span></p>
                            <p><input type="checkbox" value="Leaf" class="producer"><span class="ml-1">Leaf</span></p>
                            <p><input type="checkbox" value="SeReal" class="producer"><span class="ml-1">SeReal</span></p>
                            <p><input type="checkbox" value="Other" class="producer"><span class="ml-1">Other</span></p>
                            <p><input type="checkbox" value="All" class="producer"><span class="ml-1">All</span></p>
                            <p><input type="checkbox" value="Custom" class="producer"><span class="ml-1">Custom</span></p>
                    </div>
                    </div>
                </div>
<!--                <div class="card">-->
<!--                    <div class="card-header" id="headingfore">-->
<!--                    <h5 class="mb-0">-->
<!--                        <button class="w-100 btn btn-link collapsed d-flex justify-content-between" data-toggle="collapse" data-target="#collapsefore" aria-expanded="false" aria-controls="collapsefor">-->
<!--                            <span>All News</span>-->
<!--                            <i class='fa fa-caret-down mt-2'></i>-->
<!--                        </button>-->
<!--                    </h5>-->
<!--                    </div>-->
<!--                    <div id="collapsefore" class="collapse" aria-labelledby="headingfore" data-parent="#accordion">-->
<!--                    <div class="card-body">-->
<!--                        <p><input type="checkbox" value="Portal News"class="all_news"><span class="ml-1">Portal News</span></p>-->
<!--                        <p><input type="checkbox" value="Manufacture News"class="all_news"><span class="ml-1">Manufacture News</span></p>-->
<!--                        <p><input type="checkbox" value="Releaes News"class="all_news"><span class="ml-1">Releaes News</span></p>-->
<!--                        <p><input type="checkbox" value="Sports News"class="all_news"><span class="ml-1">Sports News</span></p>-->
<!--                        <p><input type="checkbox" value="Other News"class="all_news"><span class="ml-1">Other News</span></p>-->
<!--                        <p><input type="checkbox" id="all" value="Select All"><span class="ml-1">Select All</span></p>-->
<!--                    </div>-->
<!--                    </div>-->
<!--                </div>-->
    </div>
    <button  data-attr="filter" class='new_button my-4 py-1 px-5 item_button filter filter-page h5' >Filter</button>




<!--                <div class='news_block'>-->
<!--                    <div class='news_header'>-->
<!--                        <p class='news_title'>".$row['title']."</p>-->
<!--                        <p class='news_date'>".date('d M Y',strtotime($row['published_date']))."</p>-->
<!--                    </div>-->
<!--                    <div class='news_content'>-->
<!--                        <div class='news_image'><img img src='admin/news/uploads/".$row['img1']."'></div>-->
<!--                        <div class='news_description'>-->
<!--                            <p>".$row['discription']."</p>-->
<!--                            <div><a href='spacialnews.php?news_id=$row[id]' target='_blank'>Load More</a></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->




        </div>
        <div class="d-flex flex-column news_second">
            <div class="d-flex justify-content-between k2">
                <div class="news_type"><p class="h2 " ><?= $news_type ?></p></div>
                <div class="new_old_div">
                     <button  data-attr="newest" class='new_button my-2 py-1 px-4 item_button Newest filter-page h5'>Newest</button>
                     <button  data-attr="oldest" class='new_button my-2 py-1 px-4 item_button Newest filter-page h5'>Oldest</button>
                </div>
            </div>
            <div id="news">
                <?php
                $sql_news="SELECT * FROM news where status=1 AND news_type = '$news_type' order by id DESC LIMIT 16";
                $sql_all_news="SELECT * FROM news where status=1 AND news_type = '$news_type' order by id DESC";

                $query_news=mysqli_query($con, $sql_news);
                $query_all_news=mysqli_query($con, $sql_all_news);

                $count_rows = mysqli_num_rows($query_news);
                $count_all_rows = mysqli_num_rows($query_all_news);

                $left_news = $count_all_rows - $count_rows;


                if($count_rows >= 16) {
                    $button = '<button class="load_more_button" data-left-news="' . $left_news . '" data-news-type="' . $news_type . '" data_start="16">Load More</button>';

                }else {
                    $button = "";
                }


                if($count_rows > 0) {
                    while($row = mysqli_fetch_assoc($query_news)){
                        echo "
                           <div class='news_block'>
                    <div class='news_header'>
                        <p class='news_title'>".$row['title']."</p>
                        <p class='news_date'>".date('d M Y',strtotime($row['published_date']))."</p>
                    </div>
                    <div class='news_content'>
                        <div class='news_image'><img img src='admin/news/uploads/".$row['img1']."'></div>
                        <div class='news_description'>
                            <p>".$row['discription']."</p>
                            <div class='read_more_div'><a href='spacialnews.php?news_id=$row[id]' target='_blank'>Read More</a></div>
                        </div>
                    </div>
                </div>
                ";
                    }
                }else {
                    echo "<div class='d-flex justify-content-center align-items-center news_item '>
                        <p class='text-center font-weight-bold 'style='color:#3a9cae; font-size: 25px; font-weight:bold;' >There is no record</p>
                    </div>";
                }
                ?>

            </div>

            <div class="qqq1">
                <?= $button ?>
            </div>

        </div>
    </div>
<!--        <div class="qqq1">-->
<!--            --><?//= $button ?>
<!--        </div>-->
    </div>
</section>
<?php
include "footer.php";
?>
<script>

    let news_type = '<?= $news_type; ?>'


    $('.btn-link').on('click', function(){

$('.btn-link').find('.fa-caret-up').toggleClass('fa-caret-up')
$('.btn-link').find('.fa').addClass('fa-caret-down')
$('.btn-link').find('.fa').not($(this).find('i')).removeClass('rotate-icon')

$(this).find('i').toggleClass('rotate-icon')


})
$('.period').on('change', function(){
$('.period').removeClass('active-period')
$('.period').prop('checked', false)
$(this).prop('checked', true)
$(this).addClass('active-period')

})
$(document).ready(function(){

    function filter_data(obj){
        let click_object = "filter"
        let left_news = $(".load_more_button").attr('data-left-news')
        period=''
        if($('.active-period').val()=='Last week'){
            period='7 DAY'
        }else if($('.active-period').val()=="Last months"){
             period='31 DAY'
        }else if($('.active-period').val()=="Last 3 months"){
            period='93 DAY'
        }else if($('.active-period').val()=="Last 6 months"){
            period='186 DAY'
        }else{
            period='All news'
        }
              var filter=obj
              var sport_type = get_filter('sport_type');
              var producer = get_filter('producer');
              if(filter=="filter"){
                    $.ajax({
                    type:'post',
                    url:'checknews.php',
                    data:{filter, click_object, period, sport_type, news_type, left_news},
                    success:function(rezult){
                        let json=JSON.parse(rezult)
                            $('#news').html(json.news)
                            $(".qqq1").html(json.button)
                    }
                })  

              }else{
                $.ajax({
                    type:'post',
                    url:'checknews.php',
                    data:{filter, click_object, sport_type, producer, news_type, left_news},
                    success:function(rezult){
                        let json=JSON.parse(rezult)
                            $('#news').html(json.news)
                            $(".qqq1").html(json.button)
                    }
                })  
              }
       
           
    }


    function get_filter(class_name){
        var filter=[]
       
        $('.'+class_name+':checked').each(function(){
           
                filter.push($(this).val())
            

            
        })
        
        return filter;
    }


    $('.filter-page').on('click',function(){
        var filter=$(this).attr('data-attr')
        filter_data(filter)
        $('.filter-page').removeClass('active-filter')
        $(this).addClass('active-filter')

    })
    

$('body').on('click', '.load_more_button', function(event){
    event.preventDefault()
  
    let limit=16;
    let click_object = "load_button"
    let left_news = $(this).attr('data-left-news')
    let start = $(this).attr("data_start")

    period=''
        if($('.active-period').val()=='Last week'){
        period='7 DAY'
        }else if($('.active-period').val()=="Last months"){
             period='31 DAY'
        }else if($('.active-period').val()=="Last 3 months"){
            period='93 DAY'
        }else if($('.active-period').val()=="Last 6 months"){
            period='186 DAY'
        }else{
            period='All news'
        }
              var filter=$('.active-filter').attr('data-attr');
              var sport_type = get_filter('sport_type');
              var producer = get_filter('producer');

              if(filter=="filter"){
                    $.ajax({
                    type:'post',
                    url:'checknews.php',
                    data:{filter,period, sport_type, producer, news_type, start, left_news, click_object},
                    success:function(rezult){
                   
                        let json=JSON.parse(rezult)
                            $('#news').append(json.news)
                            $(".qqq1").html(json.button)
                    }
                })  

              }else{
                $.ajax({
                    type:'post',
                    url:'checknews.php',
                    data:{filter, sport_type, producer, news_type, start, left_news, click_object},
                    success:function(rezult){
                        let json=JSON.parse(rezult)
                        $(".qqq1").html(json.button)
                        $('#news').append(json.news)
                    }
                })  
              }
   
 })

})

</script>
</body>
</html>