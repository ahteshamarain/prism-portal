<?php
include("config.php");

if (isset($_POST['post_id']) && isset($_POST['user_id'])) {
    $post_id = mysqli_real_escape_string($connection, $_POST['post_id']);
    $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);

    // Check if the user has already liked the post
    $check_query = "SELECT COUNT(*) AS has_liked FROM `like` WHERE project_id = '$post_id' AND user_id = '$user_id'";
    $check_result = mysqli_query($connection, $check_query);
    $check_row = mysqli_fetch_assoc($check_result);

    if ($check_row['has_liked'] > 0) {
        // User has already liked, so remove the like
        $delete_query = "DELETE FROM `like` WHERE project_id = '$post_id' AND user_id = '$user_id'";
        $delete_result = mysqli_query($connection, $delete_query);

        if ($delete_result) {
            echo "unliked";
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    } else {
        // User has not liked yet, so add the like
        $insert_query = "INSERT INTO `like` (project_id, user_id) VALUES ('$post_id', '$user_id')";
        $insert_result = mysqli_query($connection, $insert_query);

        if ($insert_result) {
            echo "liked";
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
}
?>
