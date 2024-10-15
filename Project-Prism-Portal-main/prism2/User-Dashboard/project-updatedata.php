<?php
include("config.php");

if (isset($_POST['update'])) {
    // Collect form data
    $p_id = $_POST['p_id'];
    $p_name = $_POST['p_name'];
    $p_faculty = $_POST['p_faculty'];
    $p_batchcode = $_POST['p_batchcode'];
    $p_semester = $_POST['p_semester'];
    $p_url = $_POST['p_url'];
    $p_desc = $_POST['p_desc'];
    
    // Handle image upload
    $p_image = $_FILES['p_image']['name'];
    $tmp_img = $_FILES['p_image']['tmp_name'];
    
    if ($p_image) {
        // Specify the target directory and file path
        $target_dir = './assets/images/project_img/';
        $target_file = $target_dir . basename($p_image);
        
        // Move uploaded file to the target directory
        if (move_uploaded_file($tmp_img, $target_file)) {
            // Success message or handling code
        } else {
            echo '<script>
                alert("Image upload failed")
                window.location.href="user_projects.php"
                </script>';
            exit;
        }
    } else {
        // If no new image is uploaded, keep the existing image
        $p_image = $_POST['existing_image']; // Make sure to pass this value from the form
    }
    
    // Update query
    $update_query = "UPDATE `project` SET
        `project_name`='$p_name',
        `project_faculty`='$p_faculty',
        `project_batchcode`='$p_batchcode',
        `project_semester`='$p_semester',
        `project_url`='$p_url',
        `project_img`='$p_image',
        `project_desc`='$p_desc'
        WHERE `project_id`='$p_id'";

    // Execute the query
    $connect = mysqli_query($connection, $update_query);

    if ($connect) {
        echo '<script>
            alert("Project updated successfully")
            window.location.href="user_projects.php"
            </script>';
    } else {
        echo '<script>
            alert("Failed to update project")
            window.location.href="user_projects.php"
            </script>';
    }
}
?>
