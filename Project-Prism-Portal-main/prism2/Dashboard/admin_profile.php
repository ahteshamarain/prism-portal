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
                                        <h4 class="mb-sm-0">Admin Profile</h4>
                                    </div>
                                </div>
                                <form class="custom-validation" action="insert-admin.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card mb-4 shadow-lg">
                                                    <div class="card-body text-center position-relative">
                                                        <div class="position-relative d-inline-block">
                                                            <label for="upload-image">
                                                                <img id="profile-image"
                                                                    src="<?php echo 'assets/images/admin_img/'.  $_SESSION['admin_img']?>"
                                                                    alt="avatar" class="rounded-circle img-fluid shadow-sm"
                                                                    style="width: 150px; cursor: pointer;">
                                                            </label>
                                                            <input type="file" id="upload-image" name="ad_img"
                                                                class="d-none" accept="image/*" required>
                                                        </div>
                                                        <p class="text-muted mb-1 my-2">Admin</p>
                                                        <h5 class="my-1"><?php echo $_SESSION["admin_name"] ?></h5>
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
                                                            <input type="hidden" class="form-control" name="ad_id"
                                                            value="<?php echo $_SESSION['admin_id']?>">
                                                                <input type="text" class="form-control" name="ad_name"
                                                                     value="<?php echo $_SESSION['admin_name']?>" required>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="" class="mb-0">Email</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="email" class="form-control" name="ad_email"
                                                                     value="<?php echo $_SESSION['admin_email']?>">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="" class="mb-0">Password</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="password" class="form-control"
                                                                    name="ad_pass" value="">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="" class="mb-0">Repeat Password</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="password" class="form-control"
                                                                    name="ad_rpass"
                                                                    value="">
                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-end mb-2 my-4">
                                                            <input type="submit" class="btn btn-outline-primary ms-1"
                                                                name="admin-update" value="Submit">
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