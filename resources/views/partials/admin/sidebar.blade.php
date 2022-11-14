<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="{{ route("admin.home") }}">
          <img src="{{ asset('/assets/img/logo.png') }}" width="80" alt="logo" style="border-radius: 40px;"> 
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            @if(Auth()->user()->role == 'admin')
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/home') || request()->is('admin/home/*') ? 'active' : '' }}" href="{{ route("admin.home") }}">
                  <i class="ni ni-tv-2 fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Home</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/students') || request()->is('admin/students/*') ? 'active' : '' }}" href="{{ route("admin.students.index") }}">
                <i class="fas fa-users fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Student List</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/patient_list') || request()->is('admin/patient_list/*') ? 'active' : '' }}"  href="{{ route("admin.students.index") }}">
                <i class="fas fa-users fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Trainor List</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/patient_list') || request()->is('admin/patient_list/*') ? 'active' : '' }}"  href="{{ route("admin.students.index") }}">
                <i class="fas fa-users fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Animator List</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/schedule_activities') || request()->is('admin/schedule_activities/*') ? 'active' : '' }}"  href="{{ route("admin.schedule_activities.index") }}">
                <i class="fas fa-users fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Schedule & Activities</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/events') || request()->is('admin/events/*') ? 'active' : '' }}" href="{{ route("admin.events.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Manage Event</span>
                </a>
              </li>
              @endif
          </ul>
        </div>

      </div>
    </div>
  </nav>