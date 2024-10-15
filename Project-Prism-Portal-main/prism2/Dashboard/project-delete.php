<?php 

include("config.php");

if(isset($_GET["pro-id"])){
 $project_id = $_GET["pro-id"];
}

$delete = "DELETE from `project` where `project_id` = '$project_id'";
$query = mysqli_query ($connection , $delete) ;

if ($query){
    echo '<script>
    alert("Project Data Deleted Successfull")
    window.location.href="user_projects.php"
    </script>';
}
?>