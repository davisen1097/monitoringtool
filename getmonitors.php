<?php
    include("connection.php");
    session_start();
    $myObj =  new \stdClass();
    $dbresp;


    if (isset($_SESSION['user_id'])) {

        $id = $_SESSION['user_id'];
        $query = "select * from monitors where users_id = '$id'";

        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)){
                $rows[] = $row;
            }    
            $dbresp = $rows;    
        }

    }
    else{
        echo "usr is logged out";
    }

    $myObj->monitors = $dbresp;
    
    $myJSON = json_encode($myObj);
    
    echo $myJSON;
?>
