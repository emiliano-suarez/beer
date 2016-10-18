@extends('layouts.app')

@section('content')

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

<div>
    <a class="waves-effect waves-light btn" href="javascript:getLocation();">Get location</a>
    <div id="demo"></div>
    <div id="mapholder"></div>
</div>


<!-- Navbar goes here 
	<div class="parallax-container">
    <div class="parallax"><img src="/images/beer.jpg"></div>
  </div>

  <div class="section white">
    <div class="row container">
      <h2 class="header">Parallax</h2>
      <p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
    </div>
  </div>
  <div class="parallax-container">
    <div class="parallax"><img src="/public/images/beer.jpg"></div>
  </div>-->


    <!-- Page Layout here -->
    <div class="row">
   

      <div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
        <!-- Grey navigation panel

              This content will be:
          3-columns-wide on large screens,
          4-columns-wide on medium screens,
          12-columns-wide on small screens  
           <div class="card-panel">
    <div class="ilike-grey-container">This is a card panel with a teal lighten-2 class</div>
    </div>-->
        <div class="card-panel green lighten-4">Eventos Cerveceros</div>

            <div class="card-panel green lighten-4">Eventos Cerveceros</div>

    </div>

      <div class="col s12 m8 l9"> <!-- Note that "m8 l9" was added -->
        <!-- Teal page content

              This content will be:
          9-columns-wide on large screens,
          8-columns-wide on medium screens,
          12-columns-wide on small screens  -->
        <div class="card-panel grey lighten-3">Ensenada Beer Fest 2017</div>

      </div>

          
@endsection
