<?php
    include("connection.php");

    $name = $_GET['name'];
    $url = $_GET['url'];
?>


<!DOCTYPE html>
<html>
    <body>
        <style type="text/css">
            #text {

                height: 25px;
                border-radius: 5px;
                padding: 4px;
                border: solid thin #aaa;
                width: 100%;
            }

            button {

                padding: 10px;
                width: 100px;
                color: white;
                background-color: lightblue;
                border: none;
            }

            label {
                display: block;
            }

            #box {

                background-color: grey;
                margin: auto;
                width: 300px;
                padding: 20px;
            }
        </style>
        <div id="box">
            <label id="name"><?php echo $name ?> </label>
            <label id="url"><?php echo $url ?> </label>
            <button onclick="dosomething()">Ping</button>

        </div>
    </body>

</html>