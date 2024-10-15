<?php 
include("config.php");

if (isset($_GET['comment_id'])) {
    $comment_id = $_GET['comment_id']; // Ensure it's an integer

    // Prepare and execute the delete query
    $query = "DELETE FROM comment WHERE comment_id = $comment_id";
    $res = mysqli_query($connection , $query);
    
    if ($res) {
        // Display an alert and redirect after the alert is acknowledged
        echo '<script>
        alert("Data deleted successfully");
        window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";
        </script>';
    } else {
        // If an error occurs, show the error
        echo 'Error: ' . mysqli_error($connection); 
    }
}
?>
