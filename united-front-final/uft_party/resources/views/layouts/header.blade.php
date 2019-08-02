  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">UFT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">@include('layouts.project_name')</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar navbar-nav">
 
      <ul>
        <li>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <span style="font-weight: 800" class="fa fa-power">Logout</span>
          </a>
        </li>
      </ul>
   
      </div>
    </nav>
  </header>

   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
   </form>
