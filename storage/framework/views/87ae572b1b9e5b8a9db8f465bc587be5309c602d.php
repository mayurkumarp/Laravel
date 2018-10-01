<ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview <?php echo Request::is('*/dashboard*') ?"active" :""; ?>">
            <a href="<?php echo e(url('/guide')); ?>/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
       

      </ul>