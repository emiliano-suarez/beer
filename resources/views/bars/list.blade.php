@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <h1 class="bar-detail-h1">Bares & Patios Cerveceros</h1>
    
        <div>
            <span><a  href="javascript:getLocation();">Quiero ver lugares cercanos</a></span>
        </div>
        
        <div id="nearbyBarsMap"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFPDR43uGytO7LPEfFLOkLPJIGWUe_5ps" async defer></script>
    </div>

    <div class="row">
        <div class="col s12 m8 l9">

                @if ($bars)
                    @each('bars.listingview', $bars, 'bar')
                @else
                    <p>No encontramos resultados para tu búsqueda... =(</p>
                @endif

        </div>
         <div class="col s12 m4 l3">
            <p>Quiero publicidades de Google</p>
            
        </div>
    
    </div>
</div>

@endsection


 