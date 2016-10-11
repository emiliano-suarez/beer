@extends('layouts.app')

@section('content')
<div class="div-list">
    <table class="listTable" >
        @if ($bars)
            @each('bars.listingview', $bars, 'bar')
        @else
            <p>No encontramos resultados para tu búsqueda... =(</p>
        @endif
    </table>
</div>
@endsection
