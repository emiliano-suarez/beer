<div class="modal" id="modalLogin">
    <div class="modal-content">
        <h5>Ingresar a mi cuenta</h5>

        <form id="loginForm" class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col s12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="validate form-control" name="email" value="{{ old('email') }}" required autofocus />
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <label for="email" data-error="wrong" data-success="right">E-mail</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="validate form-control" name="password" required />
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <label for="password">Clave</label>
                </div>
            </div>

            <div class="row">
                <input type="checkbox" class="input-field filled-in" id="filled-in-box"/>
                <label for="filled-in-box">Mantenerme conectado</label>
            </div>
        </form>
    </div>
    <div class="valign-wrapper modal-footer align-right">
        <span><a id="btnForgotPassword" href="#" class="modal-action modal-close waves-effect waves-green">No sé mi clave</a></span>
        <a id="btnLoginForm" href="#" class="modal-action waves-effect waves-green btn-flat">Ingresar</a>
    </div>

</div>
