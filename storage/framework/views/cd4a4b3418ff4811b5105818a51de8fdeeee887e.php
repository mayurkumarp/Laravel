<?php $__env->startSection('register_form'); ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/admin/register')); ?>">
    <?php echo e(csrf_field()); ?>

     <div class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
        <label for="first_name" class="col-md-4 control-label">First Name</label>

        <div class="col-md-6">
            <input id="first_name" type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name')); ?>">

            <?php if($errors->has('first_name')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('first_name')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
        <label for="last_name" class="col-md-4 control-label">Last Name</label>

        <div class="col-md-6">
            <input id="last_name" type="text" class="form-control" name="last_name" value="<?php echo e(old('last_name')); ?>">

            <?php if($errors->has('last_name')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

            <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
        <label for="password" class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password">

            <?php if($errors->has('password')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

            <?php if($errors->has('password_confirmation')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i> Register
            </button>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.register', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>