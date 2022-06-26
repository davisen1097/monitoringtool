$(document).ready(function() {
    $( "#searchbtn" ).click(function() {
        var urlToPing = $("#searchbar").val()
        ping(urlToPing)
        // alert( $("#searchbar").val() );
      });
});



function ping(urlToPing) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) { // XMLHttpRequest.DONE == 4
           if (xmlhttp.status == 200) {
               alert(xmlhttp.responseText)
           }



           else if (xmlhttp.status == 400) {
              alert('There was an error 400');
           }
           else {
               alert('something else other than 200 was returned');
           }


        }
    };

    xmlhttp.open("GET", "ping.php?utlToPing="+urlToPing, true);
    xmlhttp.send();
}