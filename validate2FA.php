<?php
    session_start();

    include("connection.php");
    include("functions.php");
    $message = "PHP read Error";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $message = "DB connection error";


        $emailcode = $_POST['emailcode'];
        $myObj =  new \stdClass();

        if (!empty($emailcode)) {
            $message = "SQL query error";

            $query = "SELECT * FROM mailcode where mailcode_code = '$emailcode' limit 1";
            $result = mysqli_query($con, $query);

            if($result){
                $message = "Query Result Error";

                if ($result && mysqli_num_rows($result) > 0) {
                    $code_data = mysqli_fetch_assoc($result);
                    $_SESSION["user_id"] = $code_data['users_id'];
                    $message="2FA_confirmed";




                } else{ $message="wrong code!";}
            }

        } else { $message="invalid code!"; }
            
        $myObj->codemessage = $message;
        $myJSON = json_encode($myObj);
        echo $myJSON;
    } 


?>