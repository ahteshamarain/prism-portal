<?php 
include("config.php");

if(isset($_POST['projectadd'])){
    $project_name = $_POST['project-name'];
    $project_faculty = $_POST['project-faculty'];
    $project_batchcode = $_POST['project-batchcode'];
    $project_semester = $_POST['project-semester'];
    $project_technology = $_POST['project-technology'];
    $project_url = $_POST['project-url'];
    $project_img = $_FILES['project-img']['name'];
    $project_tmp_img = $_FILES['project-img']['tmp_name'];
    $project_desc = $_POST['project-desc'];

    if(!empty($project_name) AND !empty($project_faculty) 
    AND !empty($project_batchcode) AND !empty($project_semester)
    AND !empty($project_technology) AND !empty($project_url)
    AND !empty($project_img) AND !empty($project_desc)){
        $insert_project = "INSERT INTO `project` (`project_id`, `project_name`, `project_faculty`, `project_batchcode`, `project_semester`, `project_technology`, `project_url`, `project_img`, `project_desc`, `status`) 
        VALUES (NULL, '$project_name', '$project_faculty', '$project_batchcode', '$project_semester', '$project_technology', '$project_url', '$project_img', '$project_desc', 1)";
        

        $project_result = mysqli_query($connection, $insert_project);
        move_uploaded_file($project_tmp_img , './assets/images/project_img/' . $project_img);
        if($project_result){
            echo "<script> 
            alert('Project Successfully Submitted');
            window.location.href='users.php'
            </script>";
        }
    }
}
?>