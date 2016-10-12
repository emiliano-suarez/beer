@extends('layouts.app')

@section('content')

    @if ($beers)
        @each('beers.listingview', $beers, 'beer')
    @else
        <p>No encontramos resultados para tu búsqueda... =(</p>
    @endif

@endsection
