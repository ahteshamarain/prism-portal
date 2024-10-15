<?php
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';

require 'phpmailer/src/PHPMailer.php';

require 'phpmailer/src/SMTP.php';


if(isset($_POST['send']))
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->CharSet = "utf-8";
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
    
    $mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP servers
    $mail->Port = 587;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->isHTML(true);// Set email format to HTML
    
    $mail->Username = 'zaid123aptech@gmail.com';// SMTP username
    $mail->Password = 'zxbi mhrj yfky qdas';// SMTP password
    
    $mail->setFrom('zaid123aptech@gmail.com', 'Muhammad Zaid');
    $mail->Subject = 'Test';
    $mail->MsgHTML('HTML code');
    $mail->addAddress('ptmaptech@gmail.com', 'User Name');// yahan p session sy user ki email ayege
    
    
    $mail->send();




    echo "<script> 
    alert('done');
    window.location.href = 'thanks.php';
     </script>"
    
    
    
    
    ;




}






?>