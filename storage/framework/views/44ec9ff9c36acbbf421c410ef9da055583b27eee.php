<!DOCTYPE html>
<html>
<head>



    <script src="http://maps.googleapis.com/maps/api/js"></script>
<script>

    google.maps.event.addDomListener(window, 'load', initialize);




    var geocoder;
    var map;
    geocoder = new google.maps.Geocoder();
    var myCenter=new google.maps.LatLng(54.9021705,23.8955189);
    //var myCenter=new google.maps.LatLng(-33.8674869, 151.20699020000006);
    function initialize() {
        var mapProp = {
            center:myCenter,
            zoom:7,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

    }
    //window.onload = initialize();


    google.maps.event.addListener(marker, 'click', function() {
        map.setZoom(12); //9
        infowindow.open(map,marker);
    });

    google.maps.event.addListener(marker, 'click', function() {
        map.setZoom(9);
        infowindow.open(map,marker);
    });

    function codeAddress() {
                    initialize()
                    var address = document.getElementById('address').value;
                    var comment = document.getElementById('comment').value;

                    geocoder.geocode( { 'address': address}, function(results, status) {

                        if (status == google.maps.GeocoderStatus.OK) {

                            map.setCenter(results[0].geometry.location);
                            var marker = new google.maps.Marker({
                                map: map,

                                position: results[0].geometry.location

                            });
                        marker.setMap(map);

                            var infowindow = new google.maps.InfoWindow({
                                content: comment

                            });
                            infowindow.open(map,marker);

                            map.setZoom(13);

                        } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                        }

                        google.maps.event.addListener(marker, 'click', function() {
                            map.setZoom(12); //9
                            infowindow.open(map,marker);
                        });


                    });


    }




    //        function initialize() {
    //            geocoder = new google.maps.Geocoder();
    //            var latlng = new google.maps.LatLng(-34.397, 150.644);
    //            var mapOptions = {
    //                zoom: 8,
    //                center: latlng,
    //                mapTypeId: google.maps.MapTypeId.ROADMAP
    //            }
    //            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    //        }
    //
    //
    //
    //        function codeAddress() {
    //            var address = document.getElementById('address').value;
    //            geocoder.geocode( { 'address': address}, function(results, status) {
    //                if (status == google.maps.GeocoderStatus.OK) {
    //
    //                    map.setCenter(results[0].geometry.location);
    //                    var marker = new google.maps.Marker({
    //                        map: map,
    //                        position: results[0].geometry.location
    //                    });
    //                } else {
    //                    alert('Geocode was not successful for the following reason: ' + status);
    //                }
    //            });
    //        }


</script>


<?php /*    <script type="text/javascript">

        function applicationWindow(h, w, url) {


            leftOffset = (screen.width/2) - w/2;
            topOffset = (screen.height/2) - h/2;
            window.open(url, this.target, 'left=' + leftOffset + ',top=' + topOffset + ',width=' + w + ',height=' + h + ',resizable,scrollbars=yes');

        }

    </script>*/ ?>


</head>

<body >
<div id="googleMap" align="center" style="width:700px;height:550px;"></div>


<!--<button onclick="applicationWindow(300, 300, '/wind')">Pridėti</button>-->


Vieta: <input id="address" type="textbox" value="Savanorių pr. Kaunas">
Komentaras: <input id="comment" type="textbox" value="Pamečiau batą" style="width: 300px;">
<input type="button" value="Saugoti" onclick="codeAddress()">



</body>

</html>