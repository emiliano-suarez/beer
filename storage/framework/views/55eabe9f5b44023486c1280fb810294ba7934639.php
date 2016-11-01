<div class="modal mobile" id="modalForgotPassword">
    <div class="modal-content">
        <h5>No sé mi clave</h5>

        <form id="forgotPasswordForm" class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/password/email')); ?>">
            <?php echo e(csrf_field()); ?>


            <div class="row">
                <div class="input-field col s12 form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <input id="email" type="email" class="validate form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus />
                    <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                    <?php endif; ?>
                    <label for="email" data-error="wrong" data-success="right">E-mail</label>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a id="btnSendForgotPassEmail" href="#" class="modal-action waves-effect waves-green btn-flat">Continuar</a>
    </div>
</div>
