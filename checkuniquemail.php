<?php
   

    function isunique($email){

        include("connection.php");

        $myObj =  new \stdClass();
        $message = "";
    
      
            if (!empty($email)) {
                $query = " SELECT * FROM users WHERE user_email  = '$email' ";
                $result = mysqli_query($con, $query);
    
                if ($result && mysqli_num_rows($result) > 0) {
                    $message = "Email already taken";
                }
            } else {
                $message = "Email is empty";
            }
    
        $myObj->message = $message;
        
        return $myObj;

    }