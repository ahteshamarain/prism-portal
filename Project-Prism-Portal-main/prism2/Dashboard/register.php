<?php
include('config.php');


if (isset($_POST['SignUp'])) {
    $admin_name = $_POST['ad_name'];
    $admin_email = $_POST['ad_email'];
    $admin_Password = $_POST['ad_pass'];
    $admin_RPassword = $_POST['rp_pass'];

    if ($admin_Password == $admin_RPassword) {
        $hashPass = password_hash($admin_Password, PASSWORD_BCRYPT);

        $check_email = "SELECT * from `admin` where `ad_email` = '$admin_email' ";
        $run_email = mysqli_query($connection, $check_email);
        if (mysqli_num_rows($run_email) > 0) {
            echo "<script> 
            alert('Email already exist');
            window.location.href='form.php'
            </script>";
        } else {
            $admin_insert = "INSERT INTO `admin`(`ad_id`, `ad_name`, `ad_email`, `ad_pass`)
            VALUES (NULL, '$admin_name','$admin_email', '$hashPass')";
            $admin_result = mysqli_query($connection, $admin_insert);
            if ($admin_result) {
                echo "<script> 
            alert('Admin Registration successful');
            window.location.href='index.php'
            </script>";
            } else {
                echo "<script> 
            alert('Admin Registration failed');
            // window.location.href='register.php'
            </script>";
            }

        }
    } else {
        echo "<script> 
        alert('Password not matched');
        window.location.href='register.php'
        </script>";
    }

}

?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/upzet/layouts/auth-register.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Aug 2024 06:51:47 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Register | Admin & Dashboard Prism</title>
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
                            <div class="text-center">
                                <a href="index.php" class="">
                                    <img src="assets/images/logo.png" alt="" height="24"
                                        class="auth-logo logo-dark mx-auto">
                                    <img src="assets/images/logo-light.png" alt="" height="24"
                                        class="auth-logo logo-light mx-auto">
                                </a>
                            </div>

                            <h4 class="font-size-18 text-muted text-center mt-2">Free Register</h4>
                            <p class="text-muted text-center mb-4">Get your free Aptech Project Prism account now.</p>


                            <div class="row">
                                <div class="col-md-12">
                                    <form action="register.php" method="POST">
                                        <div class="mb-4">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" class="form-control" name="ad_name"
                                                placeholder="Enter username" required>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="useremail">Email</label>
                                            <input type="email" class="form-control" name="ad_email"
                                                placeholder="Enter email" required>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="ad_pass"
                                                placeholder="Enter password" required>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="userpassword">Repeat Password</label>
                                            <input type="password" class="form-control" name="rp_pass"
                                                placeholder="Enter password" required>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="term-conditionCheck"
                                                required>
                                            <label class="form-check-label fw-normal" for="term-conditionCheck">I
                                                accept
                                                <a href="#" class="text-primary">Terms and Conditions</a></label>
                                        </div>
                                        <div class="d-grid mt-4">
                                            <input type="submit" class="btn btn-primary waves-effect waves-light"
                                                value="Register" name="SignUp">
                                        </div>
                                        <div class="my-3 text-center">
                                            <p class="text-black-50">Already have an account ?<a href="login.php"
                                                    class="fw-medium text-primary"> Login </a> </p>
                                        </div>
                                    </form>
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

<!-- Mirrored from themesdesign.in/upzet/layouts/auth-register.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Aug 2024 06:51:47 GMT -->

</html>