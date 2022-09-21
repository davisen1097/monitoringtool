<?php

    function sendmail($userEmail, $twoFAcode){

        $name = "Davisen Website Monitoring Tool";  // Name of your website or yours
        $to = $userEmail;  // mail of reciever
        $subject = "Davisen Website Monitoring Tool Authentication Code";
        $body = "Please input the following authentication code: $twoFAcode to login successfully on website";
        $from = "benmooken@gmail.com";  // you mail
        $password = "bfaopheaauyczsla";  // your mail password

        // Ignore from here

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // To Here

        //SMTP Settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
        $mail->Host = "smtp.gmail.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 587;  // port
        $mail->SMTPSecure = "tls";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if ($mail->send()) {
            return "Email is sent!";
        } else {
            return "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
    }
?>