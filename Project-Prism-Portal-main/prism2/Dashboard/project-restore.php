<?php 

include('config.php');

if(isset($_GET['viewid'])){
    $project = $_GET['viewid'];
}
    $trash = "UPDATE `project` Set `status` = '0' WHERE `project_id` = '$project_id'";
    $result = mysqli_query($connection, $trash);
    if($result){
        header("location:user_edit_project.php");
    }


?>