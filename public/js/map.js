    var map;
    var infowindow;

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            $("#nearbyBarsMap").html("Geolocation is not supported by this browser.");
        }

        $('#nearbyBarsMap').height(function (index, height) {
            return (height + 400);
        });
    }

    function showPosition(position) {

          var pyrmont = {lat: position.coords.latitude, lng: position.coords.longitude};

          map = new google.maps.Map(document.getElementById('nearbyBarsMap'), {
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
        infowindow.setContent("<a href='/bar'>" + place.name + "</a>");
        infowindow.open(map, this);
      });
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
