<?php
// session_start();
// if (!isset($_SESSION['email'])) {
//     header('location: login.php');
// }
?>
<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config.php');

if (isset($_POST['company'])) {
    $admin_name = $_POST['com_name'];
    $admin_email = $_POST['com_email'];
    $admin_Password = $_POST['com_pass'];
    $admin_RPassword = $_POST['com_rpass'];
    $admin_img = $_FILES['com_img']['name'];
    $admin_img_tmp = $_FILES['com_img']['tmp_name'];

    if ($admin_Password == $admin_RPassword) {
        $hashPass = password_hash($admin_Password, PASSWORD_BCRYPT);
        $admin_profile = "INSERT INTO `company`(`company_id`, `name`, `email`, `password`, `com_img`) VALUES
         ('$admin_id','$admin_name','$admin_email','$hashPass', '$admin_img')";
        $connect = mysqli_query($connection, $admin_profile);
        move_uploaded_file($admin_img_tmp, 'assets/images/admin_img/' . $admin_img);
        if ($connect) {
            echo "<script> 
            alert('Company Registration successful');
            window.location.href='company.php'
            </script>";
        } else {
            echo "<script> 
            alert('Admin Registration failed');
             window.location.href='company.php'
            </script>";
        }

    }
}
?>




<!-- Begin page -->
<div id="layout-wrapper">
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-center">
                            <h4 class="mb-sm-0">Admin Profile</h4>
                        </div>
                    </div>
                </div> -->
                <!-- end page title -->

                <div class="row">

                    <div class="col-xl-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="col-12">
                                    <div
                                        class="page-title-box d-sm-flex align-items-center justify-content-center text-center my-2">
                                        <h4 class="mb-sm-0">Add Company</h4>
                                    </div>
                                </div>
                                <form class="custom-validation" action="add_company.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card mb-4 shadow-lg">
                                                    <div class="card-body text-center position-relative">
                                                        <div class="position-relative d-inline-block">
                                                            <label for="upload-image">
                                                                <?php
                                                                // Check if the session variable 'company_image' is set and not empty
                                                                if (isset($_SESSION['company_image']) && !empty($_SESSION['company_image'])) {
                                                                    // Set the user image path from session
                                                                    $userImage = './assets/images/admin_img/' . $_SESSION['company_image'];
                                                                } else {
                                                                    // Use a default image if 'company_image' is not available
                                                                    $userImage = './assets/images/admin_img/default-avatar.png';
                                                                }
                                                                ?>
                                                                <!-- Display the image -->
                                                                <img src="<?php echo $userImage; ?>" alt="Company Image"
                                                                    id="companyImage" style="width: 150px;"
                                                                    class="img-fluid rounded-circle shadow-sm">
                                                            </label>

                                                            <!-- Hidden file input field -->
                                                            <input type="file" id="upload-image" name="com_img" 
                                                                class="d-none" accept="image/*">

                                                            <!-- Optional: Add JavaScript to preview the uploaded image -->
                                                            <script>
                                                                // Add an event listener to preview the uploaded image
                                                                document.getElementById('upload-image').addEventListener('change', function (event) {
                                                                    const imagePreview = document.getElementById('companyImage');
                                                                    const [file] = event.target.files;
                                                                    if (file) {
                                                                        imagePreview.src = URL.createObjectURL(file);
                                                                    }
                                                                });
                                                            </script>
-
                                                        </div>
                                                        <p class="text-muted mb-1 my-2">Company Logo</p>
                                                        <h5 class="my-1"></h5>
                                                        <!-- <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->

                                                    </div>
                                                </div>

                                                <script>
                                                    document.getElementById('upload-image').addEventListener('change', function (event) {
                                                        const reader = new FileReader();
                                                        reader.onload = function () {
                                                            const output = document.getElementById('profile-image');
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(event.target.files[0]);
                                                    });
                                                </script>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="card mb-4 shadow-lg">
                                                    <div class="card-body my-2">

                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="" class="mb-0">Full Name</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="hidden" class="form-control" name="com_id"
                                                                    value="<?php echo $row['company_id'] ?>">
                                                                <input type="text" class="form-control" name="com_name"
                                                                    value="" required>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="" class="mb-0">Email</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="email" class="form-control"
                                                                    name="com_email" value="">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="" class="mb-0">Password</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="password" class="form-control"
                                                                    name="com_pass" value="">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="" class="mb-0">Repeat Password</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="password" class="form-control"
                                                                    name="com_rpass" value="">
                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-end mb-2 my-4">
                                                            <input type="submit" class="btn btn-outline-primary ms-1"
                                                                name="company" value="Submit">
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end col -->

            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



</div>
<!-- end main content-->


<?php
include('includes/footer.php');
?>