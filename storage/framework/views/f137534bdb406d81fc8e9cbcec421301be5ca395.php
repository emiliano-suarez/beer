<script>

    function statusChangeCallback(response) {

        if (response.status === 'connected') {
            // console.log('userID: ' + response.authResponse.userID);
            // console.log('accessToken: ' + response.authResponse.accessToken);
            facebookLogin(response.authResponse.userID, response.authResponse.accessToken);
            return true;
        } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            return false;
        } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
            return false;
        }
    }

    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }

    window.fbAsyncInit = function() {
        FB.init({
            appId  : '<?php echo e(config('social.facebook_app_id')); ?>',
            cookie : true,
            xfbml  : true,
            version: 'v2.8'
        });
    };

    function facebookLogin(userID, accessToken) {
        var data = 'userID=' + userID + '&accessToken=' + accessToken;

        $.ajax({
            type: 'GET',
            url: "/login/facebook",
            data: data,
            dataType: "json",
            success: function( json ) {
                $('#modalLogin').closeModal();
                location.reload();
            },
            error: function(err) {
                // TODO: catch errors to show friendly message to the user
                // alert('response: ' + response.error);
                // var response = $.parseJSON(err.responseText);
                console.log(err);
                return false;
            }
        });
    }

</script>

<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Ingresar</h1><br>

            <div scope="<?php echo e(implode(',',config('social.facebook_scope'))); ?>" onlogin="checkLoginState();" class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false"></div>

            <div><h6 class="center-align">ó</h6></div>
            
            <form id="loginForm" class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                <?php echo e(csrf_field()); ?>

                <!-- <input type="text" name="user" placeholder="Usuario"> -->
                <div class="input-field col s12 form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <input id="email" type="email" class="validate form-control" name="email" value="<?php echo e(old('email')); ?>" required />
                    <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                    <?php endif; ?>
                    <label for="email" data-error="wrong" data-success="right">E-mail</label>
                </div>
                <!-- <input type="password" name="password" placeholder="Clave"> -->
                <div class="input-field col s12 form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <input id="password" type="password" class="validate form-control" name="password" required />
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                    <label for="password">Clave</label>
                </div>
<!--
            <div class="row">
                <input type="checkbox" class="input-field filled-in" id="filled-in-box"/>
                <label for="filled-in-box">Mantenerme conectado</label>
            </div>
-->
                <input id="btnLoginForm" type="button" name="btnLoginForm" class="login loginmodal-submit" value="Ingresar">
            </form>

            <div class="login-help">
                <a href="<?php echo e(url('/register')); ?>">Registrarme</a> - <a id="btnForgotPassword" href="#">No se mi clave</a>
            </div>
        </div>
    </div>
</div>
