@extends('layouts.app')

@section('content')

    @if ($beer)

      {{ $beer[0]->name }}
      </p>
    @else
        <p>No encontramos resultados para tu búsqueda... =(</p>
    @endif

@endsection