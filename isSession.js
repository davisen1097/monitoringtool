$(document).ready(function() {
    loadXMLDoc();
});


function loadXMLDoc() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) { // XMLHttpRequest.DONE == 4
           if (xmlhttp.status == 200) {
            console.log(xmlhttp.responseText)
            res = JSON.parse(`${xmlhttp.responseText}`)

            if(res.islogged)
            {
                $("#ajaxresponse").html(`I am logged in`);
                $("#loginbutton").hide();
                $("#signupbutton").hide();

            }
            else{
                $("#ajaxresponse").html(`I am logged out`);
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
               
