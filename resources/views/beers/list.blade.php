@extends('layouts.app')

@section('content')

    @if ($beers)
        <div class="row">
        @each('beers.listingview', $beers, 'beer')
        </div>
    @else
        <p>No encontramos resultados para tu búsqueda... =(</p>
    @endif

@endsection
