<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo e(asset('dist/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo e(ucfirst($user['first_name'])." ".ucfirst($user['last_name'])); ?></p>
          <?php if($guard=='guide'): ?>
            <?php if($user['available']): ?>
              <input type="checkbox" id="available" data-on="Online" data-off="Offline" data-size="mini" data-width="70" data-onstyle="success" data-offstyle="danger" checked data-toggle="toggle">
            <?php else: ?>
              <input type="checkbox" id="available" data-on="Online" data-off="Offline" data-size="mini" data-width="70" data-onstyle="success" data-offstyle="danger" data-toggle="toggle">
            <?php endif; ?>
          <?php else: ?>
          <a href="#" id="available">
              <i class="fa fa-circle text-success"></i> Online
          </a>
          <?php endif; ?>
        </div>
      </div>

      <?php if($guard=='admin'): ?>
        <?php echo $__env->make('admin/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php elseif($guard=='guide'): ?>
        <?php echo $__env->make('guide/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php endif; ?>
    </section>
    <!-- /.sidebar -->
  </aside>