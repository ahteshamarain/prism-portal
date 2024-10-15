<?php
include('config.php');
if (isset($_POST['admin-update'])) {
    $admin_id = $_POST['ad_id'];
    $admin_name = $_POST['ad_name'];
    $admin_email = $_POST['ad_email'];
    $admin_Password = $_POST['ad_pass'];
    $admin_RPassword = $_POST['ad_rpass'];
    $admin_img = $_FILES['ad_img']['name'];
    $admin_img_tmp = $_FILES['ad_img']['tmp_name'];

    if ($admin_Password == $admin_RPassword) {
        $hashPass = password_hash($admin_Password, PASSWORD_BCRYPT);
        $admin_profile = "UPDATE `admin`  SET `ad_name` = '$admin_name', `ad_email` = '$admin_email', `ad_pass` = '$hashPass ', `ad_img` = '$admin_img' WHERE `ad_id` = '$admin_id'";
        $connect = mysqli_query($connection, $admin_profile);
        move_uploaded_file($admin_img_tmp, 'assets/images/admin_img/' . $admin_img);
        if ($connect) {
            echo "<script> 
            alert('Admin Registration successful');
            window.location.href='logout.php'
            </script>";
        } else {
            echo "<script> 
            alert('Admin Registration failed');
             window.location.href='admin_profile.php'
            </script>";
        }

    }
}

?>