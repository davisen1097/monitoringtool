<?php

    function generate2FA($id, $email)
    {
        include("connection.php");
        require("generaterandom.php");
        require("phpmailer-main/\SendMail.php");
                
        $twoFAcode = generateRandomString();
        $query = "INSERT INTO mailcode (users_id,mailcode_code) VALUES ($id , '$twoFAcode')";
        mysqli_query($con, $query);
        sendmail($email,$twoFAcode);
    }
?>