<?php
include("config.php");

if (isset($_POST['comment_id']) && isset($_POST['comment_message'])) {
    $comment_id = mysqli_real_escape_string($connection, $_POST['comment_id']);
    $comment_message = mysqli_real_escape_string($connection, $_POST['comment_message']);

    // Update the comment in the database
    $update_query = "UPDATE `comment` SET `comment_message` = '$comment_message' WHERE `comment_id` = '$comment_id'";
    $update_result = mysqli_query($connection, $update_query);

    if ($update_result) {
        echo "success";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
