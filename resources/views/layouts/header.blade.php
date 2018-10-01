<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo" style="padding-left: 5px">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="padding-left: 10px"><img src="" alt="minlogo"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="" alt="logo"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" title="toggle it">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ ucfirst($user['first_name'])." ".ucfirst($user['last_name'])}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p>
                    {{ ucfirst($user['first_name'])." ".ucfirst($user['last_name'])}} - <?= ucfirst($guard)?> 
                    <small>Member since <?= date('d M Y',  strtotime($user['created_at'])) ?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    @if(!Request::is('admin/*'))
                        <a href="{{url("$url")}}/profile" class="btn btn-default btn-flat">Profile</a>
                    @else
                        <a href="{{url("$url")}}/change-password" class="btn btn-default btn-flat">Change Password</a>
                    @endif
                </div>
                <div class="pull-right">
                  <a href="{{url("$url")}}/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>