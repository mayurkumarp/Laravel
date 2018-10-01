<?php $__env->startSection('content'); ?>



    <section class="section clearfix">
        <div class="container">
            <div class="row">
                <div id="fullwidth" class="col-sm-12">
                    <!-- START CONTENT -->
                    <div class="row">
                        <div id="content" class="col-md-12 col-sm-12 col-xs-12">
                            <div class="post-wrapper row clearfix">
                                <?php if(Request::is('admin*')): ?>
                                <div class="col-md-3 col-sm-12 col-xs-12 pad"></div>
                                <?php else: ?>
                                <div class="col-md-6 col-sm-12 col-xs-12 pad">
                                    <h5>NEW USER</h5>
                                    <hr>
                                    <a href="register" class="btn btn-primary btn-normal">Register Now</a>
                                </div><!-- end col -->
                                <?php endif; ?>
                                <div class="col-md-6 col-sm-12 col-xs-12 form-cust">
                                    <h5><?php echo e(trim(Request::route()->getPrefix(),'/')); ?></h5>
                                    <br>

                                    <?php if(Request::is('admin*')): ?>
                                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/admin/login')); ?>">
                                      <?php elseif(Request::is('guide*')): ?>
                                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/guide/login')); ?>">
                                      <?php else: ?>
                                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                                      <?php endif; ?>
                                            <?php echo e(csrf_field()); ?>


                                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                                <label for="email" class="col-sm-2 control-label">Username:</label>

                                                <div class="col-sm-10">
                                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="email">

                                                    <?php if($errors->has('email')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                                <label for="password" class="col-sm-2 control-label">Password:</label>

                                                <div class="col-sm-10">
                                                    <input id="password" type="password" class="form-control" name="password" placeholder="password">

                                                    <?php if($errors->has('password')): ?>
                                                        <span class="help-block">
                                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input class="checkbox checkbox-info" type="checkbox" name="remember"> Remember Me
                                                        </label>
                                                    </div>
                                                </div>
                                            
                                                <div class="col-sm-offset-2 col-sm-4">
                                                    <button type="submit" class="btn btn-primary btn-normal pull-right">
                                                        <i class="fa fa-btn fa-sign-in"></i> Login
                                                    </button>
                                                </div>
                                            </div>
                                            <?php if(!Request::is('admin*')): ?>
                                            <div class="form-group">
                                                <div class="col-sm-12 text-center">                                                    
                                                    <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">Forgot Your Password?</a>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </form>

                                </div><!-- end col -->


                            </div><!-- end post-wrapper -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                    <!-- END CONTENT -->

                </div><!-- end fullwidth -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('usermaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>