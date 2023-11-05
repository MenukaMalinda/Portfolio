<?php
// Include the PHPMailer library files
require "email/Exception.php";
require "email/PHPMailer.php";
require "email/SMTP.php";
// Create a new PHPMailer instance
use PHPMailer\PHPMailer\PHPMailer;

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

if(empty($name)){
    echo "Please enter your Name.";
}else if(empty($email)){
    echo "Please enter your Email.";
}else if(empty($subject)){
    echo "Please enter your Subject.";
}else if(empty($message)){
    echo "Please enter your Message.";
}else{
    // Configure Gmail SMTP settings
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = ''; // Your Gmail email address
    $mail->Password = ''; // Your app password
    $mail->SMTPSecure = 'ssl';
    // Compose the email
    $mail->setFrom($email, 'Menuka');
    $mail->addReplyTo($email, 'Menuka Malinda');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Hire Me';
    $bodyContent = '<p style="color:green;">
                    Name: ' . $name . '<br/> 
                    Email: ' . $email . '<br/> 
                    Subject: ' . $subject . '<br/> 
                    Message: ' . $message . '<br/> 
                    </p>';
    $mail->Body    = $bodyContent;

    if ($mail->send()) {
        echo 'Success';
    } else {
        echo 'sending failed';
    }

}
