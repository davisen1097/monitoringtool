<?php
    include("connection.php");

    $name = $_GET['name'];
    $url = $_GET['url'];
?>


<!DOCTYPE html>
<html>
    <body style="height: 100%;">
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
                width: 50%;
                padding: 20px;
            }
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                }

                td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                }

                tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
        <div id="box">
            <label id="name"><?php echo $name ?> </label>
            <label id="url"><?php echo $url ?> </label>
            <label id="result"></label>

            <button onclick="ping()">Ping</button>

        </div>
        <script>
            function ping() {
                var xmlhttp = new XMLHttpRequest();
            
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == XMLHttpRequest.DONE) { // XMLHttpRequest.DONE == 4
                        if (xmlhttp.status == 200) {
                            console.log(xmlhttp.responseText)
                            var matches = xmlhttp.responseText.match(/\[(.*?)\]/g); 
                            var content = "could no retrieve ping information"

                            if (matches) {
                                content="";
                                content = `${matches[0]}
                                ${matches[1]}
                                ${matches[2]}`
                        
                            }
                            document.getElementById("box").style.height = "5%";
                            document.getElementById("result").innerHTML = loadtable(matches);
                        }
                        else if (xmlhttp.status == 400) {
                            alert('There was an error 400');
                        }
                        else {
                            alert('something else other than 200 was returned');
                        }
                    }
                };
            
                xmlhttp.open("GET", "ping.php?utlToPing="+document.getElementById("url").innerHTML, true);
                xmlhttp.send();
            }

            function loadtable(content){

                return `
                <table>
                    <tr>
                        <th>URL</th>
                        <th>Ping</th>
                        <th>Load Time</th>
                    </tr>
                    <tr>
                        <td>${content[0]}</td>
                        <td>${content[1]}</td>
                        <td>${content[2]}</td>
                    </tr>
                </table>
                `

            }
        </script>
    </body>
</html>