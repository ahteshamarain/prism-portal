<?php 

include("config.php");

if(isset($_GET["c-id"])){
 $comment_id = $_GET["c-id"];
}

$delete = "DELETE from `comment` where `comment_id` = '$comment_id'";
$query = mysqli_query ($connection , $delete) ;

if ($query){
    echo '<script>
    alert("Comment Data Deleted Successfull")
    window.location.href="comments.php"
    </script>';
}
?>