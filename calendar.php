<?php
include "header.php";
include "config/con1.php";

require_once "user-logedin.php";



?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- link fontawsome for like and dislike buttons -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

<link rel="stylesheet" type="text/css" href="css/news.css?2">

<link rel="stylesheet" type="text/css" href="css/publications.css">
<link rel="stylesheet" href="css/calendar.css">


</head>
<body>
<?php include "cookie.php"; ?>

    <section class= "p-2 news">
        <div class="container">
        <div class="d-flex flex-wrap mb-4">
              <div class=" cal_first px-4">
               
                <h6 class="my-2">Apply filters</h6>
                <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0  ">
                            <button class="w-100 btn btn-link collapsed d-flex justify-content-between" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span>Date</span>
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
                                $sql="SELECT*FROM sports_type";
                                $query=mysqli_query($con,$sql);
                                while($row=mysqli_fetch_assoc($query)){
                            
                                echo  "<p><input type='checkbox' value='".$row['sport_type']."' class='sport_type'><span class='ml-1'>".$row['sport_type']."</span></p>";
                            
                                }
                            ?>
                        </div>
                    </div>
                </div>
              
    </div>
    
    <!-- <button  data-attr="filter" class='new_button my-2 py-1 px-5 clear_filter_button filter h5 filter-page' >Clear filter</button> -->
    <button  data-attr="filter" class='new_button my-4 py-1 px-5 clear_filter_button filter h5 filter-page' >Filter</button>
    </div>
    <div class="cal_second px-5">
        <h1>NEWS</h1>
        <table class="table">
            <tr>
                <td width="10%">3/3</td>
                <td width="90%">2020-21 Donruss Basketball</td>
            </tr>
            <tr>
                <td>3/3</td>
                <td>2020 Panini Plates & Patches Football</td>
            </tr>
            <tr>
                <td>3/3</td>
                <td>2020-21 Panini Prizm Premier League Soccer</td>
            </tr>
            <tr>
                <td>3/3</td>
                <td>2019-20 Upper Deck Clear Cut Hockey</td>
            </tr>
            <tr>
                <td>3/3</td>
                <td>2020 Upper Deck Marvel Ages</td>
            </tr>
            <tr>
                <td>3/5</td>
                <td>2020-21 Parkhurst Hockey</td>
            </tr>
            <tr>
                <td>3/9</td>
                <td>2020-21 Panini NBA Hoops Premium Box Set Basketball</td>
            </tr>
            <tr>
                <td>3/10</td>
                <td>2020-21 Panini Revolution Basketball</td>
            </tr>
            <tr>
                <td>3/10</td>
                <td>2020 Onyx Nimbus Baseball</td>
            </tr>
            <tr>
                <td>3/12</td>
                <td>2021 Donruss Baseball</td>
            </tr>
            <tr>
                <td>3/12</td>
                <td>2020 Panini One Football</td>
            </tr>
            <tr>
                <td>3/17</td>
                <td>2021 Topps Inception Baseball</td>
            </tr>
            <tr>
                <td>3/19</td>
                <td>2021 Bowman 1st Edition Baseball</td>
            </tr>
            <tr>
                <td>3/24</td>
                <td>2020-21 Panini Absolute MEmorabilia Basketball</td>
            </tr>
            
        </table>
    </div>
        </div>
   

    </section>


<?php
include "footer.php";
?>
<script>



</script>

</body>
</html>
