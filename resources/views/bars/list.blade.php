@extends('layouts.app')

@section('content')

<style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  #map {
    height: 100%;
  }
</style>

<script>

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            $("#demo").html("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        $("#demo").html("Latitude: " + position.coords.latitude + 
        "<br>Longitude: " + position.coords.longitude);
    }

    function showError(error) {
        var x = $("#demo");

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

    var map;
    var infowindow;

    function initMap() {

      var pyrmont = {lat: -34.577, lng: -58.436};

      map = new google.maps.Map(document.getElementById('map'), {
        center: pyrmont,
        zoom: 15
      });

      infowindow = new google.maps.InfoWindow();

      var service = new google.maps.places.PlacesService(map);
      service.nearbySearch({
        location: pyrmont,
        radius: 1000,
        types: ['bar']
      }, callback);
    }

    function callback(results, status) {
      if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
          createMarker(results[i]);
        }
      }
    }

    function createMarker(place) {
      var placeLoc = place.geometry.location;
      var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
      });

      google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
      });
    }


</script>


<div>
    <a class="waves-effect waves-light btn" href="javascript:getLocation();">Get location</a>
    <div id="demo"></div>
</div>

<div id="map"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFPDR43uGytO7LPEfFLOkLPJIGWUe_5ps&signed_in=true&libraries=places&callback=initMap" async defer></script>

    @if ($bars)
        @each('bars.listingview', $bars, 'bar')
    @else
        <p>No encontramos resultados para tu búsqueda... =(</p>
    @endif

@endsection
