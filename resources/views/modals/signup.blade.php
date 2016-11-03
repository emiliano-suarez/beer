<div id="modal-signup" class="modal modal-login">
    <div class="modal-content">
        <a href="#!" class="modal-close modal-btn-close"><i class="material-icons">clear</i></a>

        <form method="post" action="/register">

            <a href="/register/facebook" class="btn-social btn-facebook">
                <i class="fa fa-facebook"></i> Signup with facebook
            </a>

            <br>

            <h4 class="left-align">Signup</h4>

            <div class="row">
                <div class="input-field col m6 s12">
                    <input id="first-name" name="first_name" type="text" class="validate">
                    <label for="first-name">First Name</label>
                </div>

                <div class="input-field col m6 s12">
                    <input id="last-name" name="last_name" type="text" class="validate">
                    <label for="last-name">Last Name</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6 s12">
                    <input id="email" name="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>

                <div class="input-field col m6 s12">
                    <input id="password" name="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>

            <br>

            <div class="center-align">
                {{ csrf_field() }}
                <button type="submit" class="waves-effect waves-light btn-large">Sign Up</button>
            </div>

            <br>

            <div class="left-align">
                <p>By continuing, you agree to our
                    <a href="{{ url('terms') }}" target="_blank">Terms of Use</a> and
                    <a href="{{ url('privacy') }}" target="_blank">Privacy Policy</a>.
                </p>
            </div>

        </form>
    </div>
    <div class="modal-footer center-align">
        <p>Already have an account? <a href="#modal-login" class="modal-close modal-trigger">Login</a></p>
    </div>
</div>
