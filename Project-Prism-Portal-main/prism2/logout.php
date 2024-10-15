<?php 
session_start();

if(!isset($_SESSION['user_email'])){
    header('location: form.php'); // Redirect to form.php if the session is set
}

session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

?>
