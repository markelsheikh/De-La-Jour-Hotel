function getPrice(num){
    switch(num){
        case 1://Standard
            return 500;
        case 2://Executive
            return 1500;
        case 3://Centennial
            return 3500;
    }
    return 0;
}

function getCookie(name){
    var pattern = RegExp(name + "=.[^;]*")
    matched = document.cookie.match(pattern)
    if(matched){
        var cookie = matched[0].split('=')
        return cookie[1]
    }
    return false
}


function checkInput(){
    var checkIn = new Date(document.getElementById("checkIn").value);
    var checkOut = new Date(document.getElementById("checkOut").value);
    var today = new Date();
    var roomOne = document.getElementById("roomOne").value;
    var roomTwo = document.getElementById("roomTwo").value;
    var roomThree = document.getElementById("roomThree").value;

    error();

    if(roomOne && ! (roomOne >= 1 && roomOne <= 5) ){
        error("Standard Room: You can only Reserve 1 to 5 of the same room at once");
    }

    if(roomTwo && ! (roomTwo >= 1 && roomTwo <= 5)){
        error("Executive Suite: You can only Reserve 1 to 5 of the same room at once");
    }

    if(roomThree && ! (roomThree >= 1 && roomThree <= 5)){
        error("Centennial Suite: You can only Reserve 1 to 5 of the same room at once");
    }

    if( ! ( (roomOne + roomTwo + roomThree)  > 0) ){
        error("You need to reserve at least one room");
    }

    if(isNaN(checkIn.getTime())){
        error("Check In is required");
    }
    if(isNaN(checkOut.getTime())){
        error("Check Out is required");
    }

    if(checkIn.getTime() < today.getTime()){
        error("Check In Date needs to be after today's date ");
    }

    if(checkOut.getTime() < checkIn.getTime()){
        error("Check Out Date needs to be after Check In date ");
    }


    if(checkError()){
        return false;
    }

    var totalPrice = 0;

    var timeDifference = Math.abs(checkIn.getTime() - checkOut.getTime());
    var dayDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));

    var summary =
        '<table>' +
        '<tr>' +
        '<th>Room</th>' +
        '<th># of Rooms</th>' +
        '<th>Price Per Night</th>' +
        '<th>Total</th>' +
        '</tr>';

    if(roomOne){
        summary +=
        '<tr>' +
        '<td>Standard Room</td>' +
        '<td>' + roomOne + '</td>' +
        '<td>' + getPrice(1) + '</td>' +
        '<td>' + getPrice(1) * roomOne * dayDifference + '</td>' +
        '</tr>';

        totalPrice += getPrice(1) * roomOne * dayDifference;
    }

    if(roomTwo){
        summary +=
            '<tr>' +
            '<td> Executive Suite</td>' +
            '<td>' + roomTwo + '</td>' +
            '<td>' + getPrice(2) + '</td>' +
            '<td>' + getPrice(2) * roomTwo * dayDifference + '</td>' +
            '</tr>';

        if(getCookie("username")){
            totalPrice += getPrice(2) * roomTwo * dayDifference * 0.5;
        } else {
            totalPrice += getPrice(2) * roomTwo * dayDifference;
        }
        
    }

    if(roomThree){
        summary +=
            '<tr>' +
            '<td> Centennial Suite</td>' +
            '<td>' + roomThree + '</td>' +
            '<td>' + getPrice(3) + '</td>' +
            '<td>' + getPrice(3) * roomThree * dayDifference + '</td>' +
            '</tr>';
        
        if(getCookie("username")){
            totalPrice += getPrice(3) * roomThree * dayDifference * 0.5;
        } else {
            totalPrice += getPrice(3) * roomThree * dayDifference;
        }

    }

    var discount = "";

    if (getCookie("username") != false) {
        discount = "Member Discount: 50% off";
    }

    summary +=
        '<tr>' + 
        '<td>' + discount + '</td>' +
        '<td>Tax: 9%</td>' +
        '<td>Total Price:</td>' +
        '<td>' + Math.round(totalPrice * 1.09 * 100)/100 + '</td>' +
        '</tr>' +
        '</table>' +
        '<br><br>' +
        'Check In: ' + checkIn.toDateString() + ' to ' +
        'Check Out: ' + checkOut.toDateString() +
        '<br><br>';

   if(discount == ""){
       summary += 'Click <a href = "index.html">here</a> to see our discount(s)' +
        '<br><br>' +
        '<a href = "MembershipAndTravelersComments.php">Login</a> or <a href = "Register.php">Register</a>' +
        '<br><br>';
   }
    
   summary += 
        '<form>' +
        'Card Number: <input type="text"/>' +
        '<br>' +
        'Expiration Date: <input type = "date"/>' +
        '<br>' +
        '<input type = "submit"/><input type = "reset"/>' +
        '</form>';

    /*


     It is a form. The form includes a field for the card

     number, a field for the expiration date, a ‘submit’ button and a ‘reset’ button.
     */

    var summaryElement = document.getElementById("summary");

    summaryElement.innerHTML = summary;

    return false;
}


function error(errorMessage){
    var errorElement = document.getElementById("error");

    if(errorMessage) {
        errorElement.innerHTML = errorElement.innerHTML + "<br>" + errorMessage;
    }else{
        errorElement.innerHTML = "";
    }
}

function checkError(){
    var errorElement = document.getElementById("error");

    if(errorElement.innerHTML.trim() != ""){
        return true;
    }

    return false;
}

function loadImage(elementID, divID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var xmlDoc = xhttp.responseXML;
            var imageXML = xmlDoc.getElementsByTagName(elementID);
            var image = imageXML[0].getElementsByTagName("image")[0].childNodes[0].nodeValue;
            var description = imageXML[0].getElementsByTagName("description")[0].childNodes[0].nodeValue;

            divElement = document.getElementById(divID);
            divElement.innerHTML =  description + '<br><br><img src = ' + image + ' style="width:400px;height:400px" />';


        }

    };
      xhttp.open("GET", "images.xml", true);
      xhttp.send();
}

function clearImage(divID){
    divElement = document.getElementById(divID);

    divElement.innerHTML = "";
    
}

