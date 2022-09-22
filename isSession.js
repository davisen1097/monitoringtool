$(document).ready(function() {
    loadXMLDoc();
});


function loadXMLDoc() {
    var ajaxRequest = new XMLHttpRequest();

    ajaxRequest.onreadystatechange = function() {
        if (ajaxRequest.readyState == XMLHttpRequest.DONE) { // ajaxRequestRequest.DONE == 4
           if (ajaxRequest.status == 200) {
            res = JSON.parse(`${ajaxRequest.responseText}`)
            console.log(res)

            if(res.islogged)
            {
                $("#greeting").html(`Welcome back ${res.userdata.user_name}!`)
                $("#loginbutton").hide();
                $("#signupbutton").hide();
                document.getElementById("section1").style.width = "80em"
                document.getElementById("section1").innerHTML='<object type="text/html" style="width: 100%; height:100%" data="addmonitors.php" ></object>';

                // $("#section1").load("add_monitors.html")
            }
            else{

                $("#section1").html(` '<object type="text/html" style="height: 100%; width: 50em" data="searchbutton.html" ></object>'`)
                $("#logoutbutton").hide();   

            }

           }
           else if (ajaxRequest.status == 400) {
              alert('There was an error 400');
           }
           else {
               alert('something else other than 200 was returned');
           }
        }
    };

    ajaxRequest.open("GET", "checkSession.php", true);
    ajaxRequest.send();
}
               
