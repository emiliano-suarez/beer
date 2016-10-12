@extends('layouts.app')

@section('content')

    @if ($bars)
        @each('bars.listingview', $bars, 'bar')
    @else
        <p>No encontramos resultados para tu búsqueda... =(</p>
    @endif

@endsection
