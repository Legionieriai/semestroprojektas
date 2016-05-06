
$(document).ready(function () {

    google.maps.event.addDomListener(window, 'load', initialize);

var geocoder;
var map;
geocoder = new google.maps.Geocoder();
var myCenter=new google.maps.LatLng(54.9021705,23.8955189);
//var myCenter=new google.maps.LatLng(-33.8674869, 151.20699020000006);
function initialize(googleMap) {
    var mapProp = {
        center:myCenter,
        zoom:7,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

}

window.onload = initialize();

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


});


























