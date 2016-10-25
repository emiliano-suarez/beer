@extends('layouts.app')

@section('content')

    @if ($topics)
        @each('topics.listingview', $topics, 'topic')
    @else
        <p>Pronto verás la actividad de los usuarios</p>
    @endif

    <div class="divider"></div>
    @include('topics.form')

@endsection
