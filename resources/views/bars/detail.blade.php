@extends('layouts.app')

@section('content')

    @if ($bar)
      
    <h1 class="bar-detail-h1">{{ $bar->name }}</h1>
    <div class="row">
        <!-- Basic bar information -->
        <div class="col s12 m6 l6">
            <!-- Bar information -->
            <div class="card medium sticky-action">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="{{ url($bar->photo_url) }}">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">{{ $bar->name }} <i class="material-icons right">more_vert</i></span>
                </div>
                <div class="card-action">
                    <a href='#'><i class="material-icons green-darken-4">comment</i></a>
                    <a href='#'><i class="material-icons green-darken-4">share</i></a>
                    <a href='#'><i class="material-icons green-darken-4">favorite_border</i></a>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">{{ $bar->name }} <i class="material-icons right">close</i></span>
                    <p>{{ $bar->description }}</p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l6">
            <div class="card">
                <div class="card-image">
                    <img class="activator" src="https://maps.googleapis.com/maps/api/staticmap?zoom=17&size=400x250&maptype=roadmap&language=es&markers=color:0x1B5E20|-34.5717947,-58.4313896&key=AIzaSyDFPDR43uGytO7LPEfFLOkLPJIGWUe_5ps">
<!--
<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/search?key=AIzaSyDFPDR43uGytO7LPEfFLOkLPJIGWUe_5ps&zoom=16&q=bar&center=-34.5770135,-58.4367275" allowfullscreen></iframe>

<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=van%20koning%2C%20ca%C3%B1itas&key=AIzaSyDFPDR43uGytO7LPEfFLOkLPJIGWUe_5ps" allowfullscreen></iframe>
-->
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">{{ $bar->address }}</span>
                </div>
            </div>
        </div>


    </div>


    <div class="divider"></div>

    @else
        <p class="center-align">No encontramos resultados para tu búsqueda... =(</p>
    @endif

@endsection
