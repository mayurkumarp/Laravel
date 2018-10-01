<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Personal Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form class="form-horizontal frm_update_personal_information" action="updateprofile" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="col-md-12">
                        <div class="form-group field-profileform-firstname required">
                            <div class="col-md-3">
                                <label class="control-label" for="profileform-firstname">First Name</label>
                            </div>	
                            <div class="col-md-7 ">
                                <input type="text"  value="<?php echo e($guide->first_name); ?>" id="profileform-first_name" class="form-control" name="first_name">
                                <?php if ($errors->has('first_name')) { ?>
                                    <div class="text-red-change">	
                                        <?php echo $errors->first('first_name'); ?>
                                    </div>	
                                <?php } ?>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="form-group field-profileform-lastname required">
                            <div class="col-md-3">
                                <label class="control-label" for="profileform-lastname">Last Name</label>
                            </div>	
                            <div class="col-md-7 ">
                                <input type="text"  value="<?php echo e($guide->last_name); ?>" id="profileform-last_name" class="form-control" name="last_name">
                                <?php if ($errors->has('last_name')) { ?>
                                    <div class="text-red-change">	
                                        <?php echo $errors->first('last_name'); ?>
                                    </div>	
                                <?php } ?>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="form-group field-profileform-email required">
                            <div class="col-md-3">
                                <label class="control-label" for="profileform-email">Email</label>
                            </div>	
                            <div class="col-md-7 ">
                                <input type="email"  value="<?php echo e($guide->email); ?>" id="profileform-email" class="form-control" name="email">
                                <?php if ($errors->has('email')) { ?>
                                    <div class="text-red-change">	
                                        <?php echo $errors->first('email'); ?>
                                    </div>	
                                <?php } ?>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="form-group field-profileform-gender required">
                            <div class="col-md-3">
                                <label class="control-label" for="profileform-gender">Gender</label>
                            </div>	
                            <div class="col-md-7 ">
                                <?php if ($guide->gender == "Male") { ?>
                                    <input id="gender" type="radio" checked="checked" value="Male" name="gender"> Male
                                    <input id="gender" type="radio" value="Female" name="gender"> Female
                                <?php } else { ?>
                                    <input id="gender" type="radio" value="Male" name="gender"> Male
                                    <input id="gender" type="radio" checked="checked" value="Female" name="gender"> Female
                                <?php } ?>

                                <?php if ($errors->has('gender')) { ?>
                                    <div class="text-red-change">	
                                        <?php echo $errors->first('gender'); ?>
                                    </div>	
                                <?php } ?>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="form-group field-profileform-city required">
                            <div class="col-md-3">
                                <label class="control-label" for="profileform-city">City</label>
                            </div>	
                            <div class="col-md-7 ">
                                <input type="text"  value="<?php echo e($guide->city); ?>" id="profileform-city" class="form-control" name="city">
                                <?php if ($errors->has('city')) { ?>
                                    <div class="text-red-change">	
                                        <?php echo $errors->first('city'); ?>
                                    </div>	
                                <?php } ?>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="form-group field-profileform-address required">
                            <div class="col-md-3">
                                <label class="control-label" for="profileform-address">Address</label>
                            </div>	
                            <div class="col-md-7 ">
                                <input type="text"  value="<?php echo e($guide->address); ?>" id="profileform-address" class="form-control" name="address">
                                <?php if ($errors->has('address')) { ?>
                                    <div class="text-red-change">	
                                        <?php echo $errors->first('address'); ?>
                                    </div>	
                                <?php } ?>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="form-group field-profileform-contact required">
                            <div class="col-md-3">
                                <label class="control-label" for="profileform-phone_number">Contact No.</label>
                            </div>	
                            <div class="col-md-7 ">
                                <input type="text"  value="<?php echo e($guide->phone_number); ?>" id="profileform-phone_number" class="form-control" name="phone_number">
                                <?php if ($errors->has('phone_number')) { ?>
                                    <div class="text-red-change">	
                                        <?php echo $errors->first('phone_number'); ?>
                                    </div>	
                                <?php } ?>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    <div class="form-actions text-center">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><button type="submit" class="btn btn-block btn-primary">Save</button></div>	
                            <div class="col-md-3"><button type="reset" class="btn btn-block btn-default">Clear</button></div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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