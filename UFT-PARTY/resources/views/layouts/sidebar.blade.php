  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/dist/img/uftl.jpg") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- Sidebar Menu -->
    <div style="font-size:17px">
      <ul class="sidebar-menu">
        <li class="active"><a href="{{ url('dashboard') }}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
        <li><a href="{{ url('district-management') }}"><i class="fa fa-link"></i> <span>Districts</span></a></li>
        <li><a href="{{ url('agent-management') }}"><i class="fa fa-link"></i> <span>Agents</span></a></li>
        <li><a href="{{ url('member-management') }}"><i class="fa fa-link"></i> <span>Members</span></a></li>
        <li><a href="{{ url('treasury-management') }}"><i class="fa fa-link"></i> <span>Treasury</span></a></li>
        <li><a href="{{ url('salary-management') }}"><i class="fa fa-link"></i> <span>Salary</span></a></li>
        <li><a href="{{url('hierachy')}}"><i class="fa fa-link"></i> <span>Hierachy</span></a></li>
      </ul>
    </div>
    </section>
  </aside>