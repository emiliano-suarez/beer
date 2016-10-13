<div class="modal mobile" id="modalForgotPassword">
    <div class="modal-content">
        <h5>No sé mi clave</h5>

        <form id="forgotPasswordForm" class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
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
        </form>
    </div>
    <div class="modal-footer">
        <a id="btnSendForgotPassEmail" href="#" class="modal-action waves-effect waves-green btn-flat">Continuar</a>
    </div>
</div>
