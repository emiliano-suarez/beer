@extends('layouts.app')

@section('content')

    @if ($bar)
      
    <h1 class="bar-detail-h1">{{ $bar->name }}</h1>
    <div class="row">
        <!-- Basic bar information -->
        <div class="col s12 m6 l6">
            <!-- Bar information -->
            <div class="card medium sticky-action">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="{{ url($bar->photo_url) }}">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">{{ $bar->name }} <i class="material-icons right">more_vert</i></span>
                </div>
                <div class="card-action">
                    <a href='#'><i class="material-icons green-darken-4">comment</i></a>
                    <a href='#'><i class="material-icons green-darken-4">share</i></a>
                    <a href='#'><i class="material-icons green-darken-4">favorite_border</i></a>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">{{ $bar->name }} <i class="material-icons right">close</i></span>
                    <p>{{ $bar->description }}</p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l6">
            <div class="card">
                <div class="card-image">
                    <img class="activator" src="https://maps.googleapis.com/maps/api/staticmap?zoom=17&size=400x250&maptype=roadmap&language=es&markers=color:0x1B5E20|-34.5717947,-58.4313896&key=AIzaSyDFPDR43uGytO7LPEfFLOkLPJIGWUe_5ps">
<!--
<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/search?key=AIzaSyDFPDR43uGytO7LPEfFLOkLPJIGWUe_5ps&zoom=16&q=bar&center=-34.5770135,-58.4367275" allowfullscreen></iframe>

<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=van%20koning%2C%20ca%C3%B1itas&key=AIzaSyDFPDR43uGytO7LPEfFLOkLPJIGWUe_5ps" allowfullscreen></iframe>
-->
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">{{ $bar->address }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="divider"></div>

    <div class="row">
        <div class="response">
            <h4>Comentarios</h4>

            @if ($reviews)
                @each('reviews.list', $reviews, 'review')
            @else
                <p>Se el primero en comentar sobre este lugar!</p>
            @endif

        </div>
    </div>

    <div class="coment-form">
        <h4>Dejá tu comentario</h4>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/review') }}">
            <input id="reviewed_id" name="reviewed_id" type="hidden" value="{{ $bar->id }}">
            <input id="reviewed_name" name="reviewed_name" type="hidden" value="{{ $bar->name }}">
            <input id="reviewed_slug" name="reviewed_slug" type="hidden" value="{{ $bar->slug }}">
            <input id="type" name="type" type="hidden" value="bar">
            <input id="tags" name="tags" type="hidden" value="">

            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="text" class="col-md-4 control-label">Comentario *</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="text" value="{{ old('text') }}" required>

                    @if ($errors->has('text'))
                        <span class="help-block">
                            <strong>{{ $errors->first('text') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Publicar
                    </button>
                </div>
            </div>
        </form>

<!--
        <form>
            <input type="text" value="Name " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
            <input type="text" value="Subject " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" required="">
            <input type="text" value="Email (will not be published)*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email (will not be published)*';}" required="">
            <textarea type="text"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Comment...';}" required="">Your Comment...</textarea>
            <input type="submit" value="SUBMIT" >
        </form>
-->
    </div>

    @else
        <p class="center-align">No encontramos resultados para tu búsqueda... =(</p>
    @endif

@endsection
