

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">


    {{--<script src="http://maps.googleapis.com/maps/api/js">--}}
    {{--google.maps.event.addDomListener(window, 'load', initialize());--}}
    {{--</script>--}}
    <script src="http://maps.googleapis.com/maps/api/js">
        //google.maps.event.addDomListener(window, 'load', map_start());


    </script>
    {{--<script src="mapp.js"></script>--}}

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script>



        google.maps.event.addDomListener(window, 'load', load_from_database());
        google.maps.event.addDomListener(window, 'load', initialize);

        google.maps.event.addDomListener(window, "resize", resizingMap(map));

        var geocoder;
        var map;
        var map2;
        var marker;
        var infowindow = new google.maps.InfoWindow();
        var myCenter;
        var xcoord = "";
        var ycoord ="";
        geocoder = new google.maps.Geocoder();
        myCenter=new google.maps.LatLng(55.1721705,23.8955189);


        var obj;
        var dataa;

        function load_from_database() {
            $(document).ready(function () {
                $.ajax({
                    url: 'getUrl',
                    type: 'GET',
                    //dataType: 'string',
                    success: function (data) {
                        //$('#result').html(data)
                        dataa = data;
                        //alert(dataa);

                        initialize_and_load();
                    },
                    error: function (xhr, status, error) {
                        alert(error);
                    },
                });
            });
            //setTimeout( function(){initialize_and_load();} , 1500);

        }


        function initialize_and_load() {

            //alert(dataa);

            var mapProp = {
                center:myCenter,
                zoom:7,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            map2=new google.maps.Map(document.getElementById("googleMapp"),mapProp);
            setTimeout( function(){resizingMap(map2);} , 400);
            obj = JSON.parse(dataa);

            //alert(obj.length);
            //for (i = 0; i < obj.length; i++) {

            //var type = obj[i].type;
            //var address = obj[i].address;
            //var xcoord = obj[i].xcoord;
            //var ycoord = obj[i].ycoord;
            //var comment = obj[i].comment;
            //var email = obj[i].email;
            //var number = obj[i].number;
            //var picture = obj[i].picture;










//                    var location = [
//                        ['1', -33.890542, 151.274856, 1],
//                        ['2', -33.923036, 151.259052, 1],
//                        ['3', -34.028249, 151.157507, 2],
//                        ['4', -33.800101, 151.287478, 2],
//                        ['5', -33.950198, 151.259302, 2]
//                    ];



            //marker = createMarker(location, contentString);
            var contentString= new Array(obj.length);
            var infowindowtext;
            for (var i = 0; i < obj.length; i++) {

                infowindowtext =
                        '<h3>' + obj[i].type + '</h3>' +
                        '<div class=""><img align="left" width="90px"  src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Camera-icon.svg/2000px-Camera-icon.svg.png">' +
                        '<b>Vieta </b>:' + obj[i].address + '<br>' +
                        '<b>Aprašymas </b>: ' + obj[i].comment + ' <br>' +
                        '<b>El-paštas </b>:' + obj[i].email + ' <br>' +
                        '<b>Telefonas </b>:' + obj[i].telephone + '<br><br></div>';

                contentString[i] = infowindowtext;



                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(obj[i].xcoord, obj[i].ycoord),
                    map: map2,
                    title: "Paspausk!"
                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(contentString[i]);
                        var loc = (obj[i].xcoord, obj[i].ycoord);
                        map2.setCenter(loc);
                        infowindow.open(map2, marker);
                    }
                })(marker, i));
            }

            //this.infowindow.open(map2,marker);

            //map2.setZoom(15);



            //}
            //map2.setZoom(15);
            //setTimeout( function(){resizingMap();} , 400);
        }

        function createMarker(location, contentString) {
            var marker = new google.maps.Marker({
                map: map2,
                title: "Paspausk!",
                position: location,
                infowindow_text: contentString
            });
            var infowindow;
            marker.setMap(map2);
            //return marker;

            google.maps.event.addListener(marker, 'click', function() {
                map2.setCenter(location);
                //map2.setZoom(9);
                alert( marker.valueOf().infowindow_text);
                infowindow = new google.maps.InfoWindow({
                    content: marker.valueOf().infowindow_text

                });
                infowindow.open(map2,marker);
            });

//            google.maps.event.addListener(marker, 'click', (function (marker, i) {
//                return function () {
//                    infowindow.setContent(location[i][0]);
//                    infowindow.open(map, marker);
//                }
//            })(marker, i));

        }





        function initialize() {
            var mapProp = {
                center:myCenter,
                zoom:7,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
            //map2=new google.maps.Map(document.getElementById("googleMapp"),mapProp);


            setTimeout( function(){resizingMap(map);} , 400);
        }

        function gohome() {

            window.location.href = 'main';

        }
        function goout() {

            window.location.href = '/';

        }


        //
        function resizingMap(map) {
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
            var picture = "";


            //src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Camera-icon.svg/2000px-Camera-icon.svg.png"




            geocoder.geocode( { 'address': address}, function(results, status) {

                if (status == google.maps.GeocoderStatus.OK) {

                    map.setCenter(results[0].geometry.location);
                    //alert(results[0].geometry.location);
                    //var coords = setCenter(results[0].geometry.location);
                    xcoord = results[0].geometry.location.lat();
                    ycoord = results[0].geometry.location.lng();
                    marker = new google.maps.Marker({
                        map: map,
                        draggable:true,
                        title:"Tempk mane!",
                        position: results[0].geometry.location

                    });
                    marker.setMap(map);

                    var contentString =
                            '<h3>'+ type +'</h3>'+
                            '<div class=""><img align="left" width="90px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Camera-icon.svg/2000px-Camera-icon.svg.png" >'+
                            '<b>Vieta </b>:'+ address +'<br>'+
                            '<b>Aprašymas </b>: ' + comment +' <br>'+
                            '<b>El-paštas </b>:' +email + ' <br>' +
                            '<b>Telefonas </b>:' + number + '<br><br></div>';


                    infowindow = new google.maps.InfoWindow({
                        content: contentString

                    });

                    infowindow.open(map,marker);

                    map.setZoom(15);

                } else {
                    alert('Netinkamas Adresas! ' + status);
                }



//                window.location.href = "address=" + address;
//                window.location.href = "comment=" + comment;
//                window.location.href = "email=" + email;
//                window.location.href = "number=" + number;




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


        $(document).ready(function() {
            $('#closeBtn').click(function() {
                modal.style.display = "none";
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
                var picture = "";
                //alert(xcoord);
                $.ajax({
                    url: 'addUrl',
                    type: 'GET',
                    data: {
                        type: type,
                        address: address,
                        xcoord: xcoord,
                        ycoord: ycoord,
                        comment: comment,
                        email: email,
                        telephone: number,
                        picture: picture
                    },
                    success: function(data) {
                        // do something;
                            gohome();
                        //$('#result').html(data)
                    },
                    error: function() {
                        alert('error:_database');
                    }

                });
            });

        });










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
        /* The Close1 Button */
        .close1 {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close1:hover,
        .close1:focus {
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
            width: 250px;
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
        }
        .buttonn {
            display: inline-block;
            border-radius: 2px;
            background-color: #4CAF50;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 14px;
            padding: 7px 32px;
            width: 240px;
            transition: all 0.5s;
            cursor: pointer;
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
            width: 90%;
            padding: 10px;
            border-radius: 4px;
        }
        /* Style The Dropdown Button */
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            width: 250px;
            position: absolute;
            right: -500px;
            top: -32px;


        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            width: 250px;
            height:40px;

            right: -500px;
            top: -70px;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #f1f1f1

        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
            bottom: 100%;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
        .h2 {
            font-family: Copperplate, Copperplate Gothic Light, fantasy;
            font-size: 28px;
            font-style: normal;
            font-variant: normal;
            font-weight: 700;
            line-height: 5px;

        }

    </style>
</head>
<title>Lost & Found</title>
<body background="http://artrebels.com/sites/default/files/things4.jpg">
<!-- onload="initialize(), initialize_and_load()" -->


    <h2 class="h2"><b>Lost & Found : Rasti - pamesti daiktai</b></h2>


<!-- Trigger/Open The Modal -->

<button id="myBtn11" class="button1" onclick="gohome()"  src="">Pagrindinis</button>
<button id="myBtn" class="button1"  onclick="initialize()">Pridėti pamestą daiktą</button>
<button id="myBtn22" class="button1"  src="">Apie projektą</button>
<div class="dropdown">
    <button class="dropbtn">Vartotojas</button>
    <div class="dropdown-content">
        <a onclick="goout()"><b>Atsijungti</b></a>
    </div>
</div>


<br>

<div id="googleMapp" class="center" style="width:1000px;height:520px;"></div>


<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">×</span>
            <h2>Pridėti naują daiktą</h2>
        </div>
        <div class="modal-body">
            <div class="left" id="googleMap" style="width:500px;height:420px;"></div>

            <div class="right">
                <br>
                <br>
                <form action="">
                    <input type="radio"  name="radiotype" id="type1" value="Rasta" checked="checked"> Radau
                    <input type="radio"  name="radiotype" id="type2" value="Pamesta" > Pamečiau<br>
                </form>

                Vieta: <br><input id="address" class="buttonn" type="textbox" placeholder="Įveskite adresą">
                Komentaras: <br><input id="comment" class="buttonn" type="textbox" placeholder="Aprašykite daiktą">
                El-paštas:  <br><input id="email" class="buttonn" type="textbox" placeholder="įveskite el-paštą" >
                Telefonas: <br><input id="number" class="buttonn" type="textbox" placeholder="įveskite telefono numerį" ><br>
                <br><br>
                <button class="button" id="myBtnn" style="vertical-align:middle" onclick="codeAddress()" ><span>Pažymėti žemėlapyje </span></button>
                <p><span><input class="button" type="button" style="vertical-align:middle" id="closeBtn" value="Saugoti" ></span></p>

            </div>

        </div>
        <div class="modal-footer">
        </div>
    </div>

</div>



<div id="myModal1" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close1">×</span>
            <h2>Apie projektą</h2>
        </div>
        <div class="modal-body">
            <br>
            <br>
            <font size="5">Lost & Found - tai projektas padedantis žmonėms surasti jų pamestus daiktus.</font>
            <br>
        </div>

        <div class="modal-footer">
        </div>
    </div>

</div>


<footer>
    &copy; Lost & Found 2016 All rights reserved.
</footer>

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

        //modal.style.display = "none";


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


    var modal1 = document.getElementById('myModal1');

        // Get the button that opens the modal
        var btn22 = document.getElementById("myBtn22");




        // Get the <span> element that closes the modal
        var span1 = document.getElementsByClassName("close1")[0];

        // When the user clicks the button, open the modal
        btn22.onclick = function() {

            modal1.style.display = "block";
        }


        // When the user clicks on <span> (x), close the modal
        span1.onclick = function() {
            modal1.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
        }


</script>

</body>
</html>