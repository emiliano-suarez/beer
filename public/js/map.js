var map;
var infowindow;
var markers = [];
var userZoom = 14;
var defaultZoom = 12;
var userRadius = 1000;
var defaultRadius = 2000;
var defaultMapHeight = 350;
// Palermo
var defaultLatitude = -34.5781172;
var defaultLongitude = -58.4287854;

function getLocation() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showCurrentPosition, setDefaultLocation);
    } else {
        $("#nearbyBarsMap").html("Mmm... Parece que tu browser es viejito y no puede obtener tu ubicación.");
    }

    $('#nearbyBarsMap').height(function (index, height) {
        // return (height + 350);
        return defaultMapHeight;
    });
}

function showCurrentPosition(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var radius = userRadius;
    var zoom = userZoom;

    showMap(latitude, longitude, radius, zoom);
    addUserLocationMarker(latitude, longitude);
}

function setDefaultLocation(error) {
    var latitude = defaultLatitude;
    var longitude = defaultLongitude;
    var radius = defaultRadius;
    var zoom = defaultZoom;

    showMap(latitude, longitude, radius, zoom);
    addUserLocationMarker(latitude, longitude);
}

function showMap(latitude, longitude, radius, zoom) {
    var pyrmont = {lat: latitude, lng: longitude};

    map = new google.maps.Map(document.getElementById('nearbyBarsMap'), {
        center: pyrmont,
        zoom: zoom
    });

    google.maps.event.addListener(map, "click", function (e) {
        setUserLocation(e.latLng);
    })

    infowindow = new google.maps.InfoWindow();

    getNearbyBars(latitude, longitude, radius);
}

function setUserLocation(latLng) {
    var radius = userRadius;

    // Remove previous user location from the map
    deleteMarkers();

    // Set the new location
    addUserLocationMarker(latLng.lat(), latLng.lng());
    getNearbyBars(latLng.lat(), latLng.lng(), radius);
}

function getNearbyBars(latitude, longitude, radius) {
    $.ajax({
        type: 'GET',
        url: "/bares/cercanos",
        data: 'lat=' + latitude + '&lng=' + longitude + '&radius=' + radius,
        dataType: "json",
        success: function( response ) {
            $.each(response, function(index, bar) {
                createMarker(bar);
            });
        },
        error: function(err) {
            // TODO: catch errors to show friendly message to the user
            // alert('response: ' + response.error);
            // var response = $.parseJSON(err.responseText);
            console.log(err);
        }
    });
}

function createMarker(bar) {
    var barLoc = {lat: bar.location.coordinates[0], lng: bar.location.coordinates[1]};
    var marker = new google.maps.Marker({
        map: map,
        position: barLoc
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent("<a href='/bar/" + bar.slug + "'>" + bar.name + "</a>");
        infowindow.open(map, this);
    });

    markers.push(marker);
}

function addUserLocationMarker(latitude, longitude) {
    var userLocation = {lat: latitude, lng: longitude};
    var image = 'images/you-are-here-icon.png';

    var marker = new google.maps.Marker({
        map: map,
        draggable: true,
        position: userLocation,
        title: "Vos estas acá",
        icon: image
    });

    marker.addListener('dragend', function( e ) {
        setUserLocation(e.latLng);
    });

    // marker.setMap(map);
    markers.push(marker);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}

function showError(error) {
    var x = $("#nearbyBarsMap");

    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.html("User denied the request for Geolocation.");
        break;
        case error.POSITION_UNAVAILABLE:
            x.html("Location information is unavailable.");
        break;
        case error.TIMEOUT:
            x.html("The request to get user location timed out.");
        break;
        case error.UNKNOWN_ERROR:
            x.html("An unknown error occurred.");
        break;
    }
}
