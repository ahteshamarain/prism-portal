<?php
session_start();
include('config.php');

if (isset($_SESSION['admin_email'])) {
    header('Location: index.php');
    exit();
}


if (isset($_POST["LogIn"])) {
    $signIn_email = mysqli_real_escape_string($connection, $_POST["ad_email"]);
    $signIn_pass = mysqli_real_escape_string($connection, $_POST["ad_pass"]);

    $verify_signIn_email = "SELECT * FROM `admin` WHERE ad_email = '$signIn_email'";
    $verify_Result = mysqli_query($connection, $verify_signIn_email);

    if ($verify_Result && mysqli_num_rows($verify_Result) == 1) {
        $row = mysqli_fetch_assoc($verify_Result);
        $db_pass = $row['ad_pass'];

        // Verify password
        if (password_verify($signIn_pass, $db_pass)) {
            // Store session variables
            $_SESSION['admin_id'] = $row['ad_id'];
            $_SESSION['admin_name'] = $row['ad_name'];
            $_SESSION['admin_email'] = $row['ad_email'];
            $_SESSION['admin_pass'] = $row['ad_pass'];
            $_SESSION['admin_img'] = $row['ad_img'];

            echo "<script>
                alert('Sign In Successful');
                window.location.href ='index.php';
            </script>";
        } else {
            echo "<script>
                alert('Invalid Password');
                window.location.href ='login.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Invalid Email');
            window.location.href ='login.php';
        </script>";
    }
}
?>



<!doctype html>
<html lang="en">
<!-- Mirrored from themesdesign.in/upzet/layouts/auth-login.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Aug 2024 06:51:47 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Login | Admin & Dashboard Prism</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="bg-pattern">
    <div class="bg-overlay"></div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="">
                                <div class="text-center">
                                    <a href="index.php" class="">
                                        <img src="assets/images/logo.png" alt="" height="24"
                                            class="auth-logo logo-dark mx-auto">
                                        <img src="assets/images/logo-light.png" alt="" height="24"
                                            class="auth-logo logo-light mx-auto">
                                    </a>
                                </div>
                                <!-- end row -->
                                <h4 class="font-size-18 text-muted mt-2 text-center">Admin Login !</h4>
                                <p class="mb-5 text-center">Sign in to continue to Aptech Project Prism.</p>


                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="login.php" method="POST" enctype="multipart/form-data">
                                            <div class="mb-4">
                                                <label class="form-label" for="username">Admin Email</label>
                                                <input type="email" name="ad_email" class="form-control"
                                                    placeholder="Enter admin email" required>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="userpassword">Admin Password</label>
                                                <input type="password" name="ad_pass" class="form-control"
                                                    id="userpassword" placeholder="Enter password" required>
                                            </div>

                                            <div class="row">
                                                <!-- <div class="col">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="customControlInline" required>
                                                        <label class="form-label" class="form-check-label"
                                                            for="customControlInline">Remember me</label>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="col-7">
                                                    <div class="text-md-end mt-3 mt-md-0">
                                                        <a href="auth-recoverpw.php" class="text-muted"><i
                                                                class="mdi mdi-lock"></i> Forgot your password?</a>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="d-grid mt-4">
                                                <input type="submit" name="LogIn"
                                                    class="btn btn-primary waves-effect waves-light" value="LogIn">
                                            </div>
                                            <!-- <div class="my-3 text-center">
                                                <p class="text-black-50">Don't have an account ? <a href="register.php"
                                                        class="fw-medium text-primary"> Register </a> </p>
                                            </div> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end Account pages -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>


</html>