<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config.php');

if (isset($_POST['submit'])) {
    $project_name = $_POST['project_name'];
    $project_faculty = $_POST['project_facname'];
    $project_batchcode = $_POST['project_batchcode'];
    $project_semester = $_POST['project_semester'];
    $project_url = $_POST['project_url'];
    $project_desc = $_POST['desc'];
    $user_id = $_POST['user_id'];
    $project_img = $_FILES['image']['name'];
    $tmp_img = $_FILES['image']['tmp_name'];
    $category = $_POST['category'];


    $insert_project = "INSERT INTO `project` (`project_id`, `project_name`, `project_faculty`, `project_batchcode`, `project_semester`, `project_url`, `project_img`, `project_desc`,`status`,`user_id`,`category`) 
    VALUES (NULL, '$project_name', '$project_faculty', '$project_batchcode', '$project_semester', '$project_url', '$project_img', '$project_desc', 1 , '$user_id', '$category')";

    $connect = mysqli_query($connection, $insert_project);

    move_uploaded_file($tmp_img, './assets/images/project_img/' . $project_img);

    if ($connect) {
        echo '<script>
        alert("Projecy add successfully")
        window.location.href="user_projects.php"
        </script>';
    }


}

?>
<!-- Begin page -->
<div id="layout-wrapper">




    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <?php


    // Ensure $row is defined and contains the necessary keys
    if (isset($row['u_id'])) {
        $_SESSION['user_id'] = $row['u_id'];
    }

    ?>
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Add Project</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <form class="custom-validation" action="add_project.php" method="POST" enctype="multipart/form-data">
                    <input name="user_id" type="hidden" value="<?php echo $_SESSION['userid'] ?>">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <label class="form-label">Project Name</label>
                                        <input type="text" name="project_name" class="form-control" id="floatingInput"
                                            placeholder="" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Faculty Name</label>
                                        <input type="text" name="project_facname" class="form-control"
                                            id="floatingInput" placeholder="" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Batch Code </label>
                                        <input type="text" name="project_batchcode" class="form-control"
                                            id="floatingInput" placeholder="" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Semester</label>
                                        <input type="text" name="project_semester" class="form-control"
                                            id="floatingInput" placeholder="" required>
                                    </div>

                                    <div class="mb-3">
                                        <?php
                                        $query = "SELECT * FROM `project_category`";

                                        $res = mysqli_query($connection, $query);

                                        if (mysqli_num_rows($res) > 0) {
                                            ?>
                                            <label class="form-label">Technology</label>
                                            <div class="col-md-12">
                                                <select name="category" class="form-select">
                                                    <option selected="">Select Category</option>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($res)) {
                                                        echo '<option value="' . htmlspecialchars($row['c_id']) . '">' . htmlspecialchars($row['c_name']) . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <?php
                                        }
                                        ?>
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label">URL</label>
                                        <input type="url" name="project_url" class="form-control" id="floatingInput"
                                            placeholder="" required>
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label">Upload Image</label>
                                        <input class="form-control form-control-lg" name="image" type="file"
                                            id="formFile" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <div>
                                            <textarea row="5" class="form-control" name="desc"
                                                placeholder="Leave a Description here" id="floatingTextarea"
                                                style="height: 150px;" required></textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <input class="btn btn-primary w-100" type="submit" name="submit"
                                                value="Submit">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div> <!-- end col -->

            </div> <!-- end row -->
            </form>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



</div>
<!-- end main content-->


<?php
include('includes/footer.php');
?>