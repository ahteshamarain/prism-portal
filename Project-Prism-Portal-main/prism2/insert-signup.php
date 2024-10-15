<?php
include('config.php');


if(isset($_POST['SignUp'])){
    $user_name = $_POST['user_name'];
    $user_email = $_POST['email'];
    $user_Password = $_POST['pass'];
    $user_RPassword = $_POST['rp_pass'];

    if($user_Password == $user_RPassword){
    $hashPass = password_hash($user_Password, PASSWORD_BCRYPT);

        $check_email = "SELECT * from `users` where `u_email` = '$user_email' ";
        $run_email = mysqli_query($connection, $check_email);
        if(mysqli_num_rows($run_email) > 0){
            echo "<script> 
            alert('Email already exist');
            window.location.href='form.php'
            </script>";
        }else{
            $user_insert = "INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_password`) 
            VALUES (NULL, '$user_name', '$user_email', '$hashPass')";
        $user_result = mysqli_query($connection, $user_insert);
        if($user_result){
            echo "<script> 
            alert('Registration successful');
            window.location.href='form.php'
            </script>";
        }else{
            echo "<script> 
            alert('Registration failed');
            // window.location.href='form.php'
            </script>";
        }
        
        }
    }else{
        echo "<script> 
        alert('Password not matched');
        window.location.href='form.php'
        </script>";
    }

}

?>