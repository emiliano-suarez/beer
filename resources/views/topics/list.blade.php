@extends('layouts.app')

@section('content')

    @if ($topics)
        @each('topics.listingview', $topics, 'topic')
    @else
        <p>Pronto verás la actividad de los usuarios</p>
    @endif

    <div class="row">
        <div class="col m6 l8 offset-m0 offset-l2">
            <div class="divider"></div>
            @include('topics.form')
        </div>
    </div>
@endsection
