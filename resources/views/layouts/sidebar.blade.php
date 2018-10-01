<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ ucfirst($user['first_name'])." ".ucfirst($user['last_name'])}}</p>
          @if($guard=='guide')
            @if($user['available'])
              <input type="checkbox" id="available" data-on="Online" data-off="Offline" data-size="mini" data-width="70" data-onstyle="success" data-offstyle="danger" checked data-toggle="toggle">
            @else
              <input type="checkbox" id="available" data-on="Online" data-off="Offline" data-size="mini" data-width="70" data-onstyle="success" data-offstyle="danger" data-toggle="toggle">
            @endif
          @else
          <a href="#" id="available">
              <i class="fa fa-circle text-success"></i> Online
          </a>
          @endif
        </div>
      </div>

      @if($guard=='admin')
        @include('admin/sidebar')
      @elseif($guard=='guide')
        @include('guide/sidebar')
      @endif
    </section>
    <!-- /.sidebar -->
  </aside>