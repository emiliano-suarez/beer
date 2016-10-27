@extends('layouts.app')

@section('content')

    <div class="container">

    @if ($beers)
        <div class="row">
        @each('beers.listingview', $beers, 'beer')
        </div>
    @else
        <p>No encontramos resultados para tu búsqueda... =(</p>
    @endif
    </div>>

@endsection
