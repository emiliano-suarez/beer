@extends('layouts.app')

@section('content')

<<<<<<< HEAD
<!-- Navbar goes here 
=======
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


>>>>>>> 85bd041d20c389ee733000ddac1866117239821c
	<div class="parallax-container">
      <div class="parallax"><img src="images/test1.jpg"></div>
    </div>

  <div class="section white">
    <div class="row container">
      <h2 class="header">Eventos Cerveceros</h2>
      <p class="grey-text text-darken-3 lighten-3">Enterate de los proximos eventos cerveceros de Argentina</p>
      <div class="row">
     <div class="col s12 m8 l9"> <!-- Note that "m8 l9" was added -->
       <div class="card-panel grey lighten-3"> <a target="blank" href="http://www.ensenadabeerfest.com/">Ensenada Beer Fest"</a></div>
     </div>
    </div>
    </div>
  </div>
  <div class="parallax-container">
    <div class="parallax"><img src="/images/test1.jpg"></div>
  </div>


    <!-- Page Layout here -->
    


          
@endsection
