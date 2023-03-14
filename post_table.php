<?php
session_start();
include "config/con1.php";
include "classes/table.php";

if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
    if(!empty($_COOKIE['user'])){
        $user_id=$_COOKIE['user'];
    }
    if(!empty($_SESSION['user'])){
        $user_id=$_SESSION['user'];
    }   
}
if(isset($_POST['page'])){
    $content='';
    $product=$_SESSION['product'];
    $sport_type=$_SESSION['sport_type'];
    $year_prod=$_SESSION['year_prod'];
    $year=explode('-', $year_prod);
        $before_year=$year[0];
        $after_year=$year[1];

    $tables=new Tables();
    $tables->tblName=$_POST["table_name"];
    echo $_POST["table_name"];
    $tables->limit=$_POST["limit"];



    if($_POST["table_name"] == "favorite_release") {
        $conditions=array('user_id' => $user_id);
        $table = $tables -> Table($con, $conditions);
        $count = $tables -> start;
        if($table){
            while($row=mysqli_fetch_assoc($table)){
                $count++;
                $checklist_name="SELECT name_of_collection FROM collections WHERE id=$row[release_id]";
                $query_checklist_name=mysqli_query($con, $checklist_name);
                $row_name=mysqli_fetch_assoc($query_checklist_name);
                $content .= "<tr class='tr_checklist'>
                    <td>".$count."</td>
                    <td class='info'>".$row_name['name_of_collection']."</td>
                    <td data-collId='".$row['id']."'  style='text-align:center'>
                        <i class='fa fa-trash' style='font-size:30px; color: #6EA4AE; cursor: pointer'></i></td>
                </tr>";
            }
            echo $content;
        }
    }else if($_POST["table_name"] == "favorite_checklists") {
        $conditions=array('user_id' => $user_id);
        $table = $tables -> Table($con, $conditions);
        $count = $tables -> start;
        if($table){
            while($row=mysqli_fetch_assoc($table)){
                $count++;
                $checklist_name="SELECT card_name FROM base_checklist WHERE id=$row[checklist_id]";
                $query_checklist_name=mysqli_query($con, $checklist_name);
                $row_name=mysqli_fetch_assoc($query_checklist_name);
                $content .= "<tr class='tr_checklist'>
                    <td>".$count."</td>
                    <td class='info'>".$row_name['card_name']."</td>
                    <td data-collId='".$row['id']."'  style='text-align:center'>
                        <i class='fa fa-trash' style='font-size:30px; color: #6EA4AE; cursor: pointer'></i></td>
                </tr>";
            }
            echo $content;
        }
    } else if ($_POST["table_name"] == "favorite_dates") {
        $conditions=array('user_id' => $user_id);
        $table = $tables -> Table($con, $conditions);
        $count = $tables -> start;

        if($table) {
            while ($row = mysqli_fetch_assoc($table)) {
                $count++;
                $sport_type = "SELECT sport_type FROM sports_type WHERE id = $row[sport_id]";
                $sport_type_query = mysqli_query($con, $sport_type);
                $sport_row = mysqli_fetch_assoc($sport_type_query);
                $sport_name = $sport_row['sport_type'];
                $checklist_name = "SELECT data FROM dates WHERE id=$row[date_id]";
                $query_checklist_name = mysqli_query($con, $checklist_name);
                $row_name = mysqli_fetch_assoc($query_checklist_name);
                $content .= "<tr class='tr_checklist'>
                    <td>" . $count . "</td>
                    <td class='info' style='width: 50%'>" . $row_name['data'] . "</td>
                    <td style='text-align: center' class='typee'>" . $row['type'] . "</td>
                    <td style='text-align: center'>" . $sport_name . "</td>
                    <td data-collId='" . $row['id'] . "' style='text-align:center'>
                        <i class='fa fa-trash' style='font-size:30px; color: #6EA4AE; cursor: pointer'></i></td>
                </tr>";
            }
            echo $content;
        }
    }else if($_POST["table_name"] == "collections") {
        $conditions=array('sport_type' => $sport_type);
        $table=$tables->TableSportYear($con, $before_year, $after_year, $conditions);
        $count = $tables->start;
        if($table){
            while($row=mysqli_fetch_assoc($table)){
                $count++;
                $content.="<tr data-collId='".$row['id']."' class='tr_checklist'>
                    <td>".$count."</td>
                    <td>".$row['name_of_collection']."</td>
                    <td>".$row['year_of_releases']."</td>
                </tr>";
            }
            echo $content;
        }
    }
    else if($_POST["table_name"] == "custom_name_checklist") {      
        $conditions=array('user_id' => $user_id);
        $table=$tables->Table($con, $conditions);
        $count = $tables->start;
        if($table){
            
            while($row=mysqli_fetch_assoc($table)){
                
                    $count++;
                    $content .= "<tr data-collId='".$row['id']."' class='tr_checklist'>
                        <td>".$count."</td>
                        <td class='info'>".$row['name_of_checklist']."</td>
                        <td class='icons'>
                            <i class='fa fa-edit'></i>
                            <i class='fa fa-trash'></i>
                        </td>
                    </tr>";
            }
            echo $content;
        }
    }
}

?>