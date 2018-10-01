<ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview <?php echo Request::is('admin/dashboard*') ?"active" :""; ?>">
          <a href="<?php echo e(url('/admin')); ?>/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
       
</ul>
