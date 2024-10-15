<?php
include("config.php");

if (isset($_POST['update'])) {
    $p_id = $_POST['p_id'];
    $p_name = $_POST['p_name'];
    $p_faculty = $_POST['p_faculty'];
    $p_batchcode = $_POST['p_batchcode'];
    $p_semester = $_POST['p_semester'];
    $p_url = $_POST['p_url'];
    $p_image = $_FILES['p_image']['name'];
    $tmp_img = $_FILES['p_image']['tmp_name'];
    $p_desc = $_POST['p_desc'];

}
$update_project = "UPDATE `project` SET
    `project_name`='$p_name',`project_faculty`=' $p_faculty',`project_batchcode`=' $p_batchcode',`project_semester`=' $p_semester',`project_url`=' $p_url',`project_img`=' $p_image',`project_desc`=' $p_desc' WHERE  `project_id`='$p_id'";

$connect = mysqli_query($connection, $update_project);

move_uploaded_file($tmp_img, 'assets/images/project_img/' . $p_image);

if ($connect) {
    echo '<script>
        alert("Project Updated successfully")
        window.location.href="user_projects.php"
        </script>';
}
?>