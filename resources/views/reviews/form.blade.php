<div class="coment-form">
    <h4>Dejá tu comentario</h4>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/review') }}">
        <input id="reviewed_id" name="reviewed_id" type="hidden" value="{{ $object->id }}">
        <input id="reviewed_name" name="reviewed_name" type="hidden" value="{{ $object->name }}">
        <input id="reviewed_slug" name="reviewed_slug" type="hidden" value="{{ $object->slug }}">
        <input id="type" name="reviewed_type" type="hidden" value="{{ $object->reviewed_type }}">
        <input id="tags" name="tags" type="hidden" value="{{ $object->tags }}">

        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
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

</div>
