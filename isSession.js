$(document).ready(function() {
    loadXMLDoc();
});


function loadXMLDoc() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) { // XMLHttpRequest.DONE == 4
           if (xmlhttp.status == 200) {
            res = JSON.parse(`${xmlhttp.responseText}`)
            console.log(res)

            if(res.islogged)
            {
                $("#greeting").html(`Welcome back ${res.userdata.user_name}!`)
                $("#loginbutton").hide();
                $("#signupbutton").hide();
                document.getElementById("section1").innerHTML='<object type="text/html" style="width: 100%; height:100%" data="addmonitors.php" ></object>';

                // $("#section1").load("add_monitors.html")
            }
            else{

                $("#section1").html(` '<object type="text/html" style="height: 100%" data="searchbutton.html" ></object>'`)
                $("#logoutbutton").hide();   

            }

           }
           else if (xmlhttp.status == 400) {
              alert('There was an error 400');
           }
           else {
               alert('something else other than 200 was returned');
           }
        }
    };

    xmlhttp.open("GET", "checkSession.php", true);
    xmlhttp.send();
}
               
