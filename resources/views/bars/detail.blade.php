@extends('layouts.app')

@section('content')

    @if ($bar)
      
    <h1>{{ $bar->name }}</h1>
    <div class="row">
        <!-- Basic bar information -->
        <div class="col s12 m6 s6 grey lighten-1">


            <picture>
              <!-- <source srcset="img_smallflower.jpg" media="(max-width: 400px)"> -->
              <source srcset="{{ url($bar->photo_url) }}">
              <img class="scale" src="{{ url($bar->photo_url) }}" alt="{{ $bar->name }}">
            </picture>

<!--
            <div class="card large horizontal">
              <div class="card-image">
                <img src="">
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p>I am a very simple card. I am good at containing small bits of information.</p>
                </div>
                <div class="card-action">
                  <a href="#">This is a link</a>
                </div>
              </div>
            </div>
-->
        </div>
        <div class="col s12 m6 s6 blue lighten-1">
            
        </div>
    </div>

    <div class="divider"></div>

    <div class="row">
        <div class="col s12 blue lighten-1"><p class="center-align">s12</p></div>
    </div>
    <div class="row">
        <div class="col s12 m4 l2 teal lighten-1"><p class="center-align">s12 m4</p></div>
        <div class="col s12 m4 l8 teal lighten-2"><p class="center-align">s12 m4</p></div>
        <div class="col s12 m4 l2 teal lighten-3"><p class="center-align">s12 m4</p></div>
    </div>
    <div class="row">
        <div class="col s12 m6 l3 purple lighten-3"><p class="center-align">s12 m6 l3</p></div>
        <div class="col s12 m6 l3 purple lighten-3"><p class="center-align">s12 m6 l3</p></div>
        <div class="col s12 m6 l3 purple lighten-6"><p class="center-align">s12 m6 l3</p></div>
        <div class="col s12 m6 l3 purple lighten-7"><p class="center-align">s12 m6 l3</p></div>
    </div>

    @else
        <p class="center-align">No encontramos resultados para tu búsqueda... =(</p>
    @endif

@endsection
