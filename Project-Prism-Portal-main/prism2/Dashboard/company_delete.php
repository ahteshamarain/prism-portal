<?php 

include("config.php");

if(isset($_GET["c-id"])){
 $company_id = $_GET["c-id"];
}

$delete = "DELETE from `company` where `company_id` = '$company_id'";
$query = mysqli_query ($connection , $delete) ;

if ($query){
    echo '<script>
    alert("Company Deleted Successfull")
    window.location.href="company.php"
    </script>';
}
?>