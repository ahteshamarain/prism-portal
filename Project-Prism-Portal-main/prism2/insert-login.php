<?php
session_start();
error_reporting(E_ALL); // Enable all error reporting for debugging
include('config.php');

if (isset($_POST['SignIn'])) {
    $usernameOrEmail = $_POST['email']; // Could be email or username
    $password = $_POST['pass']; // Plain text password

    // Check if the connection is valid
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Check if user is an admin (admin table)
    $queryAdmin = mysqli_query($connection, "SELECT ad_id, ad_pass, ad_name, ad_img FROM `admin` WHERE ad_name='$usernameOrEmail' OR ad_email='$usernameOrEmail'");
    $retAdmin = mysqli_fetch_array($queryAdmin);

    // Check if user is a company (company table)
    $queryCompany = mysqli_query($connection, "SELECT company_id, password, name, com_img FROM `company` WHERE name='$usernameOrEmail' OR email='$usernameOrEmail'");
    $retCompany = mysqli_fetch_array($queryCompany);

    // Check if user is a normal user (users table)
    $queryUser = mysqli_query($connection, "SELECT u_id, u_password, u_name, u_img, u_cv FROM `users` WHERE u_name='$usernameOrEmail' OR u_email='$usernameOrEmail'");
    $retUser = mysqli_fetch_array($queryUser);

    // Verify password for admin
    if ($retAdmin && password_verify($password, $retAdmin['ad_pass'])) {
        $_SESSION['adminid'] = $retAdmin['ad_id'];
        $_SESSION["admin_name"] = $retAdmin['ad_name'];
        $_SESSION['admin_email'] = $retAdmin['ad_email'];
        $_SESSION['admin_pass'] = $retAdmin['ad_pass'];
        $_SESSION["admin_image"] = $retAdmin['ad_img'];
        $_SESSION['role'] = 'admin'; // Set role to admin

        header('location: ./dashboard/index.php'); // Redirect to admin dashboard
        exit(); // Exit after redirection

    // Verify password for company
    } elseif ($retCompany && password_verify($password, $retCompany['password'])) {
        $_SESSION['companyid'] = $retCompany['company_id'];
        $_SESSION["company_name"] = $retCompany['name'];
        $_SESSION["company_image"] = $retCompany['com_img'];
        $_SESSION['role'] = 'company'; // Set role to company
        header('location: index.php'); // Redirect to company dashboard
        exit(); // Exit after redirection

    // Verify password for normal user
    } elseif ($retUser && password_verify($password, $retUser['u_password'])) {
        $_SESSION['userid'] = $retUser['u_id'];
        $_SESSION["user_name"] = $retUser['u_name'];
        $_SESSION['user_studentid'] = $retUser['u_studentid'];
        $_SESSION['user_number'] = $retUser['u_number'];
        $_SESSION['user_address'] = $retUser['u_address'];
        $_SESSION['user_cv'] = $retUser['u_cv'];
        $_SESSION['user_email'] = $retUser['u_email'];
        $_SESSION['user_password'] = $retUser['u_password'];
        $_SESSION['user_image'] = $retUser['u_img'];
        $_SESSION['role'] = 'user'; // Set role to user

        header('location: index.php'); // Redirect to user dashboard
        exit(); // Exit after redirection

    // If no match
    } else {
        echo "<script>alert('Invalid email, username, or password');</script>";
        echo "<script>window.location.href = 'form.php';</script>"; // Use JS to redirect
    }
}
?>
