<?php
// session_start();
include "config/con1.php";
if(isset($_SESSION['language'])){
  $lng=$_SESSION['language'];
}
else{
  $lng='en';
}

?>

<link rel="stylesheet" href="css/navbar-news.css">

<section id="fix">
<header class="navbar navbar-expand-lg navbar-light bg-light" id="head-er">
<div class="container">
  <a class="navbar-brand" href="/test/collection-cards/">
    <div id="logo"> 
    <img src="logo-png.png" id="logo">
    </div> 
  </a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-controls="navbarSupportedContent1 navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
    <span>  <i class="fa fa-bars" id="icon-bars"></i></span>
  </button>
  <div class="collapse navbar-collapse multi-collapse" id="navbarSupportedContent">
    <form class="form-inline ml-auto">
    <div class="input-group" id="head-search">
      <input type="text" class="form-control" placeholder="Search something">
      
      <div class="input-group-prepend">
        <span class="input-group-text" id="search-border"><i class="fa fa-search" id="icon-search"></i></span>
      </div>
    </div>    
    </form>
    
<div class="d-flex ml-auto" id="header-right">
     <div><a href = "login-register.php" class="register">Register or Log in</a></div>
    <!-- <div >Rus</div> -->
    <!-- -------------------------- -->
    <div data-google-lang="<?php if($lng=='ru'){
            echo 'en';}
        else{
            echo 'ru';}
         ?>" class="language__img" name="lezu" ><?php
        if($lng=='ru'){echo 'Eng';}
        else{echo 'Rus';}
        ?>
        </div>
    <!-- ----------------------------- -->
  </div>
  <div>
  
</div>
</header>
  <!-- --------------------------- -->

  <div id="nav" >
    <div class="container" id="container-nav">
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center" id="sub-nav">
  <div class="collapse navbar-collapse multi-collapse" id="navbarSupportedContent2">
    <ul class="navbar-nav nav-pills nav-fill" id="nav-ul">
      <li class="nav-item active">
        <a class="nav-link nav_bigger" href="/test/collection-cards/">Home <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Collections</a>
      </li> -->
      <li class="nav-item dropdown" >
        <a class="nav-link" id="nav-products" href="select_releases_checklists.php" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
          Releases
        </a>

        <!-- -------- -->
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                   <li class="dropdown">
                       <a class="dropdown-item main-a" href="">Checklists</a>
                       <ul class="dropdown-menu">
                        <?php
                        $sql="SELECT * FROM sports_type";
                        $res=mysqli_query($con, $sql);
                        while($row=mysqli_fetch_assoc($res)){
                          echo '<li class="dropdown">
                               <a class="dropdown-item s_type" href="#">'.$row['sport_type'].'</a>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item nav_dr_item" href="#" name="checklist">1900-1949</a></li>
                                   <li><a class="dropdown-item nav_dr_item" href="#" name="checklist">1950-1979</a></li>
                                   <li><a class="dropdown-item nav_dr_item" href="#" name="checklist">1980-1999</a></li>
                                   <li><a class="dropdown-item nav_dr_item" href="#" name="checklist">2000-2009</a></li>
                                   <li><a class="dropdown-item nav_dr_item" href="#" name="checklist">2010-2018</a></li>
                                   <li><a class="dropdown-item nav_dr_item" href="" name="checklist">2019-2020</a></li>
                               </ul>
                           </li>';
                        }
                        ?>
                        <!--    <li class="dropdown">
                               <a class="dropdown-item" href="#">Baseball</a>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">1900-1949</a></li>
                                   <li><a class="dropdown-item" href="#">1950-1979</a></li>
                                   <li><a class="dropdown-item" href="#">1980-1999</a></li>
                                   <li><a class="dropdown-item" href="#">2000-2009</a></li>
                                   <li><a class="dropdown-item" href="#">2010-2018</a></li>
                                   <li><a class="dropdown-item" href="#">2019</a></li>
                                   <li><a class="dropdown-item" href="#">2020</a></li>
                               </ul>
                           </li>
                           <li class="dropdown">
                               <a class="dropdown-item" href="#">Football</a>
                               <ul class="dropdown-menu">
                               <li><a class="dropdown-item" href="#">1900-1949</a></li>
                                   <li><a class="dropdown-item" href="#">1950-1979</a></li>
                                   <li><a class="dropdown-item" href="#">1980-1999</a></li>
                                   <li><a class="dropdown-item" href="#">2000-2009</a></li>
                                   <li><a class="dropdown-item" href="#">2010-2018</a></li>
                                   <li><a class="dropdown-item" href="#">2019</a></li>
                                   <li><a class="dropdown-item" href="#">2020</a></li>
                               </ul>
                           </li>
                           <li class="dropdown">
                               <a class="dropdown-item" href="#">Basketball</a>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">1900-1949</a></li>
                                   <li><a class="dropdown-item" href="#">1950-1979</a></li>
                                   <li><a class="dropdown-item" href="#">1980-1999</a></li>
                                   <li><a class="dropdown-item" href="#">2000-2009</a></li>
                                   <li><a class="dropdown-item" href="#">2010-2018</a></li>
                                   <li><a class="dropdown-item" href="#">2019</a></li>
                                   <li><a class="dropdown-item" href="#">2020</a></li>
                               </ul>
                           </li>
                           <li class="dropdown">
                               <a class="dropdown-item" href="#">Hockey</a>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">1900-1949</a></li>
                                   <li><a class="dropdown-item" href="#">1950-1979</a></li>
                                   <li><a class="dropdown-item" href="#">1980-1999</a></li>
                                   <li><a class="dropdown-item" href="#">2000-2009</a></li>
                                   <li><a class="dropdown-item" href="#">2010-2018</a></li>
                                   <li><a class="dropdown-item" href="#">2019</a></li>
                                   <li><a class="dropdown-item" href="#">2020</a></li>
                               </ul>
                           </li>
                           <li class="dropdown">
                               <a class="dropdown-item" href="#">Soccerl</a>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">1900-1949</a></li>
                                   <li><a class="dropdown-item" href="#">1950-1979</a></li>
                                   <li><a class="dropdown-item" href="#">1980-1999</a></li>
                                   <li><a class="dropdown-item" href="#">2000-2009</a></li>
                                   <li><a class="dropdown-item" href="#">2010-2018</a></li>
                                   <li><a class="dropdown-item" href="#">2019</a></li>
                                   <li><a class="dropdown-item" href="#">2020</a></li>
                               </ul>
                           </li>
                           <li class="dropdown">
                               <a class="dropdown-item" href="#">Fighting</a>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">1900-1949</a></li>
                                   <li><a class="dropdown-item" href="#">1950-1979</a></li>
                                   <li><a class="dropdown-item" href="#">1980-1999</a></li>
                                   <li><a class="dropdown-item" href="#">2000-2009</a></li>
                                   <li><a class="dropdown-item" href="#">2010-2018</a></li>
                                   <li><a class="dropdown-item" href="#">2019</a></li>
                                   <li><a class="dropdown-item" href="#">2020</a></li>
                               </ul>
                           </li> -->
                           <!-- <li class="dropdown">
                               <a class="dropdown-item" href="#">Add collection</a>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">Base</a></li>
                                   <li><a class="dropdown-item" href="#">Custom</a></li>
                                   <li><a class="dropdown-item" href="#">Personal</a></li>
                               </ul>
                           </li> -->
                       </ul>
                   </li>
                   <!-- -----------------------SETS----------------------- -->

                   <li class="dropdown">
                       <!-- <a class="dropdown-item" href="#">Sets</a>-->
                       <a class="dropdown-item main-a" href="#">Releases</a>
                       <ul class="dropdown-menu">
                         <?php
                        $sql="SELECT * FROM sports_type";
                        $res=mysqli_query($con, $sql);
                        while($row=mysqli_fetch_assoc($res)){
                          echo '<li class="dropdown">
                               <a class="dropdown-item s_type" href="#">'.$row['sport_type'].'</a>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item nav_dr_item" href="#" name="set">1900-1949</a></li>
                                   <li><a class="dropdown-item nav_dr_item" href="#" name="set">1950-1979</a></li>
                                   <li><a class="dropdown-item nav_dr_item" href="#" name="set">1980-1999</a></li>
                                   <li><a class="dropdown-item nav_dr_item" href="#" name="set">2000-2009</a></li>
                                   <li><a class="dropdown-item nav_dr_item" href="#" name="set">2010-2018</a></li>
                                   <li><a class="dropdown-item nav_dr_item" href="#" name="set">2019-2020</a></li>
                               </ul>
                           </li>';
                        }
                        ?>
                           <!-- <li class="dropdown">
                               <a class="dropdown-item" href="#">Baseball</a>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">1900-1949</a></li>
                                   <li><a class="dropdown-item" href="#">1950-1979</a></li>
                                   <li><a class="dropdown-item" href="#">1980-1999</a></li>
                                   <li><a class="dropdown-item" href="#">2000-2009</a></li>
                                   <li><a class="dropdown-item" href="#">2010-2018</a></li>
                                   <li><a class="dropdown-item" href="#">2019</a></li>
                                   <li><a class="dropdown-item" href="#">2020</a></li>
                               </ul>
                           </li>
                           <li class="dropdown">
                               <a class="dropdown-item" href="#">Football</a>
                               <ul class="dropdown-menu">
                               <li><a class="dropdown-item" href="#">1900-1949</a></li>
                                   <li><a class="dropdown-item" href="#">1950-1979</a></li>
                                   <li><a class="dropdown-item" href="#">1980-1999</a></li>
                                   <li><a class="dropdown-item" href="#">2000-2009</a></li>
                                   <li><a class="dropdown-item" href="#">2010-2018</a></li>
                                   <li><a class="dropdown-item" href="#">2019</a></li>
                                   <li><a class="dropdown-item" href="#">2020</a></li>
                               </ul>
                           </li>
                           <li class="dropdown">
                               <a class="dropdown-item" href="#">Basketball</a>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">1900-1949</a></li>
                                   <li><a class="dropdown-item" href="#">1950-1979</a></li>
                                   <li><a class="dropdown-item" href="#">1980-1999</a></li>
                                   <li><a class="dropdown-item" href="#">2000-2009</a></li>
                                   <li><a class="dropdown-item" href="#">2010-2018</a></li>
                                   <li><a class="dropdown-item" href="#">2019</a></li>
                                   <li><a class="dropdown-item" href="#">2020</a></li>
                               </ul>
                           </li>
                           <li class="dropdown">
                               <a class="dropdown-item" href="#">Hockey</a>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">1900-1949</a></li>
                                   <li><a class="dropdown-item" href="#">1950-1979</a></li>
                                   <li><a class="dropdown-item" href="#">1980-1999</a></li>
                                   <li><a class="dropdown-item" href="#">2000-2009</a></li>
                                   <li><a class="dropdown-item" href="#">2010-2018</a></li>
                                   <li><a class="dropdown-item" href="#">2019</a></li>
                                   <li><a class="dropdown-item" href="#">2020</a></li>
                               </ul>
                           </li>
                           <li class="dropdown">
                               <a class="dropdown-item" href="#">Soccerl</a>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">1900-1949</a></li>
                                   <li><a class="dropdown-item" href="#">1950-1979</a></li>
                                   <li><a class="dropdown-item" href="#">1980-1999</a></li>
                                   <li><a class="dropdown-item" href="#">2000-2009</a></li>
                                   <li><a class="dropdown-item" href="#">2010-2018</a></li>
                                   <li><a class="dropdown-item" href="#">2019</a></li>
                                   <li><a class="dropdown-item" href="#">2020</a></li>
                               </ul>
                           </li>
                           <li class="dropdown">
                               <a class="dropdown-item" href="#">Fighting</a>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">1900-1949</a></li>
                                   <li><a class="dropdown-item" href="#">1950-1979</a></li>
                                   <li><a class="dropdown-item" href="#">1980-1999</a></li>
                                   <li><a class="dropdown-item" href="#">2000-2009</a></li>
                                   <li><a class="dropdown-item" href="#">2010-2018</a></li>
                                   <li><a class="dropdown-item" href="#">2019</a></li>
                                   <li><a class="dropdown-item" href="#">2020</a></li>
                               </ul>
                           </li> -->
                           <!-- <li class="dropdown">
                               <a class="dropdown-item" href="#">Add collection</a>
                               <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">Base</a></li>
                                   <li><a class="dropdown-item" href="#">Custom</a></li>
                                   <li><a class="dropdown-item" href="#">Personal</a></li>
                               </ul>
                           </li> -->
                       </ul>
                   </li>
                   <!-- ----------------New releases calendar--------------------- -->
                   <li class="">
                       <a class="dropdown-item main-a" href="#">New releases<p>calendar</p> </a>
                   </li>
               </ul>
        <!-- -------------------- -->

      </li>
      <!-- ----------------------------- -->

      <!-- ---------------------------------- -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Checklists</a>
      </li>-->
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#">Template</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Store</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link disabled" href="total-statistics.php">Statistics</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link hover_news dropdown-toggle" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
          News
        </a>
        <ul class="drop_news dropdown-menu " aria-labelledby="navbarDropdownMenuLink"> 
         
            <?php
              $sqlnews="SELECT *FROM subnews";
              $query=mysqli_query($con, $sqlnews);
              while($row = mysqli_fetch_assoc($query)){
                  echo "<li class='dropdown-item main-a'><a href='news.php?news_type=" . $row['subnews_name'] . "'>".$row['subnews_name']."</a></li>";
              }
            ?>            
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="publications.php">Publications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="aboutus.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="contact.php">Contacts</a>
      </li>
    </ul>
  </div>
</nav>
</div>
</div>
</section>

<script src="js/navbar.js"></script>