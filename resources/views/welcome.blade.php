@extends('layouts.app')

@section('content')

El contenido de la home va aquí... =)

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

/*
    function showPosition(position) {
        var latlon = position.coords.latitude + "," + position.coords.longitude;

        var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlon+"&zoom=14&size=400x300&sensor=false";

        $("#mapholder").html("<img src='"+img_url+"'>");
    }
*/

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

</script>

<div class="container">
    <a class="waves-effect waves-light btn" href="javascript:getLocation();">Get location</a>
    <div id="demo"></div>
    <div id="mapholder"></div>
</div>

@endsection
