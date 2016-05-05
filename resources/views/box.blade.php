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
            var type = document.getElementById('type').value;


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
                            '<div class=""><img align="left" width="90px" src="http://www.rpds.lt/images/pvz.png"></div>'+
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

        .modal-header {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
        }

        .modal-body {padding: 2px 16px;}

        .modal-footer {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
        }
    </style>
</head>
<title>Lost & Found</title>
<body onload="initialize()">


<?php
//$servername = "localhost";
//$username = "username";
//$password = "password";
//
//// Create connection
//$conn = new mysqli($servername, $username, $password);
//
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";
//?>



<h1>Geriausias visų laikų projektas!</h1>
<div id="googleMapp" style="width:500px;height:380px;"></div>



<!-- Trigger/Open The Modal -->
<button id="myBtn"   onclick="initialize()">Pridėti pamestą daiktą</button>


<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">×</span>
            <h2>Pridėti naują tašką</h2>
        </div>
        <div class="modal-body">
            <div id="googleMap" style="width:500px;height:380px;"></div>


            <form action="">
                <input type="radio" name="radiotype" id="type" value="Rastas" checked> Radau
                <input type="radio" name="radiotype" id="type" value="Pamestas" > Pamečiau<br>
            </form>

            Vieta: <input id="address" type="textbox" value="Savanorių pr. Kaunas">
            Komentaras: <input id="comment" type="textbox" value="Pamečiau batą" style="width: 300px;"> <br>
            El. paštas: <input id="email" type="textbox" value="vardas@pastas.lt" >
            Telefonas: <input id="number" type="textbox" value="+370..." >
            <input type="button" id="myBtnn" value="Ieškoti" onclick="codeAddress()">
            <p><input type="button" id="closeBtn" value="Saugoti"></p>
        </div>
        <div class="modal-footer">
        </div>
    </div>

</div>






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
