var map;
var infowindow;

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showMap, showError);
    } else {
        $("#nearbyBarsMap").html("Mmm... Parece que tu browser es viejito y no puede obtener tu ubicación.");
    }

    $('#nearbyBarsMap').height(function (index, height) {
        return (height + 400);
    });
}

function showMap(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var radius = 1000;

    var pyrmont = {lat: latitude, lng: longitude};

    map = new google.maps.Map(document.getElementById('nearbyBarsMap'), {
        center: pyrmont,
        zoom: 14
    });

    infowindow = new google.maps.InfoWindow();

    $.ajax({
        type: 'GET',
        url: "/bares/cercanos",
        data: 'lat=' + latitude + '&lng=' + longitude + '&radius=' + radius,
        dataType: "json",
        success: function( response ) {
            $.each(response, function(index, bar) {
                createMarker(bar);
            });
            addUserLocationMarker(position);
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
}

function addUserLocationMarker(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var userLocation = {lat: latitude, lng: longitude};
    var image = 'images/you-are-here-icon.png';

    var marker = new google.maps.Marker({
        map: map,
        position: userLocation,
        title: "Vos estas acá",
        icon: image
    });
    marker.setMap(map);
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
