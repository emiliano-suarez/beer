@extends('layouts.app')

@section('content')
    <div class="container">

    <div>
        <a class="waves-effect waves-light btn" href="javascript:getLocation();">Mostrar bares cercanos a mí</a>

        <div id="nearbyBarsMap"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFPDR43uGytO7LPEfFLOkLPJIGWUe_5ps" async defer></script>
    </div>

    @if ($bars)
        @each('bars.listingview', $bars, 'bar')
    @else
        <p>No encontramos resultados para tu búsqueda... =(</p>
    @endif

</div>
@endsection
