<?php
include("config.php");

if (isset($_POST['update'])) {
    // Sanitize input to avoid SQL injection
    $user_id = mysqli_real_escape_string($connection, $_POST['u_id']); 
    $user_name = mysqli_real_escape_string($connection, $_POST['u_name']);
    $user_studentid = mysqli_real_escape_string($connection, $_POST['u_studentid']);
    $user_number = mysqli_real_escape_string($connection, $_POST['u_number']);
    $user_address = mysqli_real_escape_string($connection, $_POST['u_address']);

    // Handle CV upload
    if (!empty($_FILES['u_cv']['name'])) {
        $user_cv = $_FILES['u_cv']['name'];
        $user_cv_tmp = $_FILES['u_cv']['tmp_name'];
        $cv_target_path = 'assets/images/user_img/' . $user_cv;
        move_uploaded_file($user_cv_tmp, $cv_target_path);
    } else {
        // If no new CV is uploaded, don't change the existing one
        $query = "SELECT u_cv FROM users WHERE u_id='$user_id'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $user_cv = $row['u_cv']; // Keep the existing CV
    }

    // Handle Image upload
    if (!empty($_FILES['u_img']['name'])) {
        $user_img = $_FILES['u_img']['name'];
        $user_img_tmp = $_FILES['u_img']['tmp_name'];
        $img_target_path = 'assets/images/user_img/' . $user_img;
        move_uploaded_file($user_img_tmp, $img_target_path);
    } else {
        // If no new image is uploaded, keep the existing one
        $query = "SELECT u_img FROM users WHERE u_id='$user_id'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $user_img = $row['u_img']; // Keep the existing image
    }

    // Update query
    $update_profile = "UPDATE `users` SET 
        `u_name` = '$user_name', 
        `u_studentid` = '$user_studentid', 
        `u_number` = '$user_number', 
        `u_address` = '$user_address', 
        `u_cv` = '$user_cv', 
        `u_img` = '$user_img' 
        WHERE `u_id` = '$user_id'";

    // Execute query and check for errors
    $connect = mysqli_query($connection, $update_profile);
    
    if ($connect) {
        echo '<script>
            alert("Profile updated successfully");
            window.location.href="user_profile.php";
            </script>';
    } else {
        // Output SQL error for debugging
        echo '<script>
            alert("Profile update failed: ' . mysqli_error($connection) . '");
            window.location.href="user_profile.php";
            </script>';
    }
}
?>
