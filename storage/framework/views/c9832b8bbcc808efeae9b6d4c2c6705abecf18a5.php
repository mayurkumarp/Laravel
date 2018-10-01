<!-- Main Content -->
<?php $__env->startSection('content'); ?>
<section id="page-header" class="section background">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Reset Password</h3>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end section -->
<section class="section clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reset Password</div>
                    <div class="panel-body form-cust">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/user/forgot_password')); ?>">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input placeholder="email" id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('usermaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>