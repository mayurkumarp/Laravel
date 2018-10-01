<?php $__env->startSection('content'); ?>

<div class="row">
    
    <div class="col-md-12">

        
        <!-- change password -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form class="form-horizontal frm_change_password" action="savepassword" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="col-md-12">
                        <div class="form-group field-changepasswordform-oldpass required">
                            <div class="col-md-3">
                                <label class="control-label" for="changepasswordform-oldpass">Old Password</label>
                            </div>	
                            <div class="col-md-7 ">
                                <input type="password"  value="<?php echo e(old('old_password')); ?>" id="changepasswordform-oldpass" class="form-control" name="old_password">
                                <?php if ($errors->has('old_password')) { ?>
                                    <div class="text-red-change">	
                                        <?php echo $errors->first('old_password'); ?>
                                    </div>	
                                <?php } ?>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="form-group field-changepasswordform-newpass required">
                            <div class="col-md-3">
                                <label class="control-label" for="changepasswordform-newpass">New Password</label>
                            </div>	
                            <div class="col-md-7">
                                <input type="password" value="<?php echo e(old('password')); ?>" id="changepasswordform-newpass" class="form-control" name="password">
                                <?php if ($errors->has('password')) { ?>
                                    <div class="text-red-change">	
                                        <?php echo $errors->first('password'); ?>
                                    </div>	
                                <?php } ?>							
                            </div>
                            <div class="col-md-2"></div>
                        </div>


                        <div class="form-group field-changepasswordform-repeatnewpass required">
                            <div class="col-md-3">
                                <label class="control-label" for="changepasswordform-repeatnewpass">Confirm New Password</label>
                            </div>	
                            <div class="col-md-7">
                                <input type="password" value="<?php echo e(old('password_confirmation')); ?>" id="changepasswordform-repeatnewpass" class="form-control" name="password_confirmation">
                                <?php if ($errors->has('password_confirmation')) { ?>
                                    <div class="text-red-change">	
                                        <?php echo $errors->first('password_confirmation'); ?>
                                    </div>	
                                <?php } ?>	
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="col-md-3"></div>
                        <div class="col-md-3"><button type="submit" class="btn btn-block btn-primary">Save</button></div>	
                        <div class="col-md-3"><button type="reset" class="btn btn-block btn-default">Clear</button></div>
                        <div class="col-md-3"></div>	
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/master_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>