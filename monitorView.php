<?php
    include("connection.php");
    $name = $_GET['name'];
    $url = $_GET['url'];
    $id = $_GET['id'];
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
                color: black;
                background-color: #aa9904;
                border: none;
            }

            label {
                display: block;
               
            }

            #box {

                background-color: #333;
                margin: auto;
                width: 50%;
                height: 90px;
                padding: 20px;
                font-family: cursive;
                font-size: 15px;
                color:#aa9904 ;
                
            
            }

            a{

                color:#aa9904 ;
                font-family: cursive;
                font-size: 20px;

            }
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                
                }

                td, th {
                border: 3px solid #dddddd;
                border-color: white;
                text-align: left;
                font-family: cursive;
                padding: 8px;
                border: 8px;
                border-color: #aa9904;
                border-style: groove;
                }

                tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
        <div id="box">
            <label id="name">Monitor Name: <?php echo $name ?> </label>
            <label id="url">URL: <?php echo $url ?> </label>
            <label id="result"></label>
            <br> 
            <button onclick="ping()">Ping</button> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <button onclick="deletemonitor()">Remove</button>&nbsp&nbsp&nbsp&nbsp
            <a href=<?php echo "metrics.html?url=".$url."&id=".$id."&name=".$name?> target="_blank" rel="noopener noreferrer" >view metrics</a>
        </div>
        <script>
            function ping() {
                var xmlhttp = new XMLHttpRequest();
            
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                        var content = "could not retrieve ping information";

                        if (xmlhttp.status == 200) {
                            console.log(xmlhttp.responseText)
                            var matches = xmlhttp.responseText.match(/\[(.*?)\]/g); 

                            if (matches) {
                                content="";
                                content = loadtable(matches);
                                document.getElementById("box").style.height = "5%";
                            }

                        }
                        else if (xmlhttp.status == 400) { console.error("bad request") }
                        else { content += ` due to an error ${xmlhttp.status}`; }

                        document.getElementById("result").innerHTML = content;
                    }
                };

                var queryParams = `monitor=<?php echo $id ?>&urlToPing=<?php echo $url ?>&monitorname=<?php echo $name ?>`;
                var link = `ping.php?${queryParams}`;

                console.log(link)

                xmlhttp.open("GET", link, true);
                xmlhttp.send();
            }

            function loadtable(content){

                return `
                <table>
                    <tr>
                        <th>URL</th>
                        <th>Latency</th>
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

            function deletemonitor() {
                parent.parent.parent.window.location.href = "./deletemonitorindb/delete.php?id="+<?php echo $id ?>;
            }
        </script>

    </body>
</html>