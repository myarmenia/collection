
<?php
include "config/con1.php";
//include "classes/pagination.php";
$start = '';
if(isset($_POST["start"])) {
    $start=$_POST["start"];
}else {
    $start=0;



}
$limit=16;
if(isset($_POST["news_type"])) {
    $news_type = $_POST["news_type"];
}
//$page=1;
//if(isset($_POST['page'])){
//    $page = $_POST['page'];
//    if($_POST['page']>1){
//        $start = (($_POST['page']-1)*$limit);
//    }else{
//        $start=0;
//    }
//}

 $sql = "SELECT *FROM news WHERE status=1 AND news_type = '$news_type' ";
    if(isset($_POST['period'])){
        $period=$_POST['period'];
        if($_POST['period']!="All news"){
            $sql .= " and published_date>(NOW()-INTERVAL ".$period." ) ";
        }else{

        }
        
    }
    if(isset($_POST['sport_type'])){
       
        $sport_type_filter=implode("','" , $_POST["sport_type"]);   
        $sql .= " AND sport_type IN('".$sport_type_filter."')";

    }
   
    if(isset($_POST['producer'])){
       
        $producer_filter=implode("','" , $_POST["producer"]);  
        $sql .= " AND producer IN('".$producer_filter."')";

    }
   
    // creating filter  via asc and desc
      
     if($_POST['filter']=='newest'){
      
        $sql.=" ORDER BY id DESC";
    }else if($_POST['filter']=='oldest'){
        $sql.=" ORDER BY id ASC";
      
    }
    else{
        $sql.=" ORDER BY id DESC";
       
           
        }

        $sql1 = $sql;
        $sql.=" limit ".$start.','.$limit."";

    $query=mysqli_query($con,$sql);
    $query1=mysqli_query($con,$sql1);
    $num_rows=mysqli_num_rows($query);
    $num_rows1 = mysqli_num_rows($query1);
    $start1 = $start + 16;

    if(isset($_POST['click_object'])) {
        $click_object = $_POST['click_object'];
        if($click_object == "load_button") {
            $left_news = $_POST['left_news'];
            $left_news -= 16 ;
        }else {
            $left_news = $num_rows1 - $num_rows;
        }
    }




    if($left_news > 0) {
        $button = '<button class="load_more_button" data-left-news="' . $left_news . '" data-news-type="' . $news_type . '" data_start="' . $start1  . '">Load More</button>';
    }else {
        $button = "";
    }

    $arr=[];
    $output='';



    if($num_rows>0){
    
        while($row=mysqli_fetch_assoc($query)){
                    
            $output.= "
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
     }else{
        $output.= " <div class='d-flex justify-content-center align-items-center news_item '>
                     <p class='text-center font-weight-bold 'style='color:#3a9cae; font-size: 25px; font-weight:bold;' >There is no record</p>
                </div>
             ";
        $button = "";
     }

     $arr['news']=$output;
    $arr["sql"] = $sql;
    $arr["button"] = $button;
    echo json_encode($arr);

?>