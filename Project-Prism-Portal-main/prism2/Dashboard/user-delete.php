<?php 

include("config.php");

if(isset($_GET["u-id"])){
 $user_id = $_GET["u-id"];
}

$delete = "DELETE from `users` where `u_id` = '$user_id'";
$query = mysqli_query ($connection , $delete) ;

if ($query){
    echo '<script>
    alert("User Data Deleted Successfull")
    window.location.href="users.php"
    </script>';
}
?>