<?php $__env->startSection('register_form'); ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/guide/register')); ?>">
    <?php echo e(csrf_field()); ?>

     <div class="form-group<?php echo e($errors->has('first_name')||$errors->has('last_name') ? ' has-error' : ''); ?>">
        <label for="first_name" class="col-sm-3 control-label">Name:</label>

        <div class="col-sm-4">
            <input id="first_name" type="text" class="form-control height-auto" name="first_name" value="<?php echo e(old('first_name')); ?>" placeholder="first name">

            <?php if($errors->has('first_name')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('first_name')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

        <div class="col-sm-4">
            <input id="last_name" type="text" class="form-control height-auto" name="last_name" value="<?php echo e(old('last_name')); ?>" placeholder="last name">

            <?php if($errors->has('last_name')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
        <label class="col-sm-3 control-label">Gender</label>
        <div class="col-sm-8">
            
                    <input type="radio" name="gender" value="male"  /> Male <span class="fa fa-male"></span>
                
                    <input type="radio" name="gender" value="female" /> Female <span class="fa fa-female"></span>
               

        <?php if($errors->has('gender')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('gender')); ?></strong>
            </span>
        <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('phone_number') ? ' has-error' : ''); ?>">
        <label for="phone_number" class="col-sm-3 control-label">Contact</label>

        <div class="col-sm-8">
            <input id="phone_number" type="text" class="form-control height-auto" name="phone_number" value="<?php echo e(old('phone_number')); ?>" placeholder="Mobile number">

            <?php if($errors->has('phone_number')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('phone_number')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
        <label for="address" class="col-sm-3 control-label">Address</label>
        <div class="col-sm-8">
            <textarea id="address" type="text" class="form-control height-auto" name="address" placeholder="Place, City, State..."><?php echo e(old('address')); ?></textarea>

            <?php if($errors->has('address')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('address')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
        <label for="city" class="col-sm-3 control-label">City</label>
        <div class="col-sm-8">
            <input id="address" type="text" class="form-control height-auto" name="city" value="<?php echo e(old('city')); ?>" placeholder="City"/>
            <?php if($errors->has('city')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('city')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
        <label for="email" class="col-sm-3 control-label">E-Mail</label>

        <div class="col-sm-8">
            <input id="email" type="email" class="form-control height-auto" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email Address">

            <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
        <label for="password" class="col-sm-3 control-label">Password</label>

        <div class="col-sm-8">
            <input id="password" type="password" class="form-control height-auto" name="password" placeholder="Password">

            <?php if($errors->has('password')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
        <label for="password-confirm" class="col-sm-3 control-label">Confirm Password</label>

        <div class="col-sm-8">
            <input id="password-confirm" type="password" class="form-control height-auto" name="password_confirmation" placeholder="Confirm password">

            <?php if($errors->has('password_confirmation')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-8 col-sm-offset-3">
            <button type="submit" class="btn btn-primary btn-normal pull-right">
                <i class="fa fa-btn fa-user"></i> Register
            </button>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.register', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>