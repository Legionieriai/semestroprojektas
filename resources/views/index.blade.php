<!DOCTYPE html>
<html>
<head>


        {{--<script src="http://maps.googleapis.com/maps/api/js">--}}
        {{--google.maps.event.addDomListener(window, 'load', initialize());--}}
        {{--</script>--}}
    <script src="http://maps.googleapis.com/maps/api/js">
        //google.maps.event.addDomListener(window, 'load', map_start());


    </script>
    {{--<script src="mapp.js"></script>--}}
    <script>




        google.maps.event.addDomListener(window, 'load', initialize);

        google.maps.event.addDomListener(window, "resize", resizingMap());

        var geocoder;
        var map;
        var map2;
        var marker;
        var infowindow;
        var myCenter;
        geocoder = new google.maps.Geocoder();
        myCenter=new google.maps.LatLng(54.9021705,23.8955189);



        //var myCenter=new google.maps.LatLng(-33.8674869, 151.20699020000006);
        function initialize() {
            var mapProp = {
                center:myCenter,
                zoom:7,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
            map2=new google.maps.Map(document.getElementById("googleMapp"),mapProp);


            setTimeout( function(){resizingMap();} , 400);


        }




        //
        function resizingMap() {
            if(typeof map =="undefined") return;
            var center = map.getCenter();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        }
        //window.onload = initialize();


        function codeAddress() {
            initialize()
            var address = document.getElementById('address').value;
            var comment = document.getElementById('comment').value;
            var email = document.getElementById('email').value;
            var number = document.getElementById('number').value;
            if (document.getElementById('type1').checked) {
                var type = document.getElementById('type1').value;
            }
            if (document.getElementById('type2').checked) {
                var type = document.getElementById('type2').value;
            }


            geocoder.geocode( { 'address': address}, function(results, status) {

                if (status == google.maps.GeocoderStatus.OK) {

                    map.setCenter(results[0].geometry.location);

                    marker = new google.maps.Marker({
                        map: map,
                        draggable:true,
                        title:"Tempk mane!",
                        position: results[0].geometry.location

                    });
                    marker.setMap(map);


                    var contentString =
                            '<h3>'+ type +'</h3>'+
                            '<div class=""><img align="left" width="90px"  src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Camera-icon.svg/2000px-Camera-icon.svg.png">'+
                            '<b>Vieta</b>:'+ address +'<br>'+
                            '<b>Aprašymas</b>: ' + comment +' <br>'+
                            '<b>Elektroninis paštas</b>:' +email + ' <br>' +
                            '<b>Telefonas</b>:' + number + '<br><br></div>';



                    infowindow = new google.maps.InfoWindow({
                        content: contentString

                    });

                    infowindow.open(map,marker);

                    map.setZoom(15);

                } else {
                    alert('Netinkamas Adresas! ' + status);
                }

                google.maps.event.addListener(marker, 'click', function() {
                    map.setZoom(17);
                    infowindow.open(map,marker);
                });






                    google.maps.event.addListener(marker, 'dragend', function() {
                        //updateMarkerStatus('Drag ended');


                        geocoder.geocode({
                            latLng: marker.getPosition()
                        }, function(responses) {
                            if (responses && responses.length > 0) {
                                document.getElementById("address").value = responses[0].formatted_address;
                            } else {
                                document.getElementById("address").value = "Tempkite toliau";
                            }
                        });


                        //document.getElementById("address").value = evt[0].latLng.formatted_address;
                        //document.getElementById("address").value = evt[0].geometry.location ; // evt.latLng.lat() evt.latLng.lng()

                });

                google.maps.event.addListener(marker, 'dragstart', function(evt){
                    document.getElementById("address").value = '-----';
                });


            });


        }






    </script>

    <style>


        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        @keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        /* The Close Button */
        .close {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .button1 {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .button {
            display: inline-block;
            border-radius: 2px;
            background-color: #4CAF50;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 16px;
            padding: 15px 32px;
            width: 240px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '«';
            position: absolute;
            opacity: 0;
            top: 0;
            left: -5px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-left: 17px;
        }

        .button:hover span:after {
            opacity: 1;
            left: 0;
        }




        .modal-header {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
        }

        .modal-body {
            padding: 2px 16px 443px;


        }

        .modal-footer {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
        }

        .right {
            position: absolute;
            right: 100px;
            width: 300px;
            padding: 2px;
        }
        .left {
            position: absolute;
            left: 0px;
            width: 300px;
            padding: 10px;
        }

        .center {
            margin: auto;
            width: 80%;
            padding: 5px;
        }

    </style>
</head>
<title>Lost & Found</title>
<body onload="initialize()">

<h2>Lost & Found : Rasti - pamesti daiktai</h2>


<!-- Trigger/Open The Modal -->
<button id="myBtn" class="button1"  onclick="initialize()">Pridėti pamestą daiktą</button>
<br>

<div id="googleMapp" class="center" style="width:1000px;height:520px;"></div>




<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">×</span>
            <h2>Pridėti naują tašką</h2>
        </div>
        <div class="modal-body">
           <div class="left" id="googleMap" style="width:500px;height:420px;"></div>

            <div class="right">
            <form action="">
                <input type="radio" name="radiotype" id="type1" value="Rasta" checked="checked"> Radau
                <input type="radio" name="radiotype" id="type2" value="Pamesta" > Pamečiau<br>
            </form>

                Vieta: <input id="address" type="textbox" placeholder="Savanorių pr. Kaunas"><br>
                Komentaras: <input id="comment" type="textbox" placeholder="Pamečiau batą"> <br>
                El. paštas:  <input id="email" type="textbox" placeholder="vardas@pastas.lt" > <br>
                Telefonas: <input id="number" type="textbox" placeholder="+370..." > <br>
                <button class="button" id="myBtnn" style="vertical-align:middle" onclick="codeAddress()" ><span>Pažymėti žemėlapyje </span></button>
                <p><span><input class="button" type="button" style="vertical-align:middle" id="closeBtn" value="Saugoti"></span></p>
            </div>

        </div>
        <div class="modal-footer">
        </div>
    </div>

</div>


<?php
$servername = "localhost";
$username = "root";
$password = "psw";
$dbname = "lostandfound";

//// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//
//$sql = "SELECT 1, 2, 3 FROM pirmas";
//$result = $conn->query($sql);
//
//if ($result->num_rows > 0) {
//    // output data of each row
//    while($row = $result->fetch_assoc()) {
//        echo "id: " . $row["1"]. " - Name: " . $row["2"]. " " . $row["3"]. "<br>";
//    }
//} else {
//    echo "0 results";
//}
//$conn->close();


?>




<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");


    // Get the button that closes the modal
    var btn2 = document.getElementById("closeBtn");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        initialize();
        modal.style.display = "block";
    }

    // When the user clicks the close button, close the modal
    btn2.onclick = function() {
        modal.style.display = "none";
    }


    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>
