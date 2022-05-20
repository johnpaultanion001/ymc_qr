<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="{{ route("admin.home") }}">
          <img src="{{URL::asset('/assets/img/logo.jpg')}}" width="90px"   alt="LOGO"> 
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
                <a class="nav-link {{ request()->is('admin/patient_list') || request()->is('admin/patient_list/*') ? 'active' : '' }}" href="{{ route("admin.patient") }}">
                <i class="fas fa-users fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Patient List</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/appointment') || request()->is('admin/appointment/*') ? 'active' : '' }}" href="{{ route("admin.appointment.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Manage Appointment</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : '' }}" href="{{ route("admin.services.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Manage Services</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/announcements') || request()->is('admin/announcements/*') ? 'active' : '' }}" href="{{ route("admin.announcements.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Manage Announcements</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/doctors') || request()->is('admin/doctors/*') ? 'active' : '' }}" href="{{ route("admin.doctors.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Manage Doctors Account</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{  request()->is('admin/historical/filter/*') ? 'active' : '' }}" href="/admin/historical/filter/all">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Historical Data</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/activity_log') || request()->is('admin/activity_log/*') ? 'active' : '' }}" href="{{ route("admin.activity_log") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Activity Log</span>
                </a>
              </li>
              
              @endif
              @if(Auth()->user()->role == 'doctor')
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('admin/doctor/account') || request()->is('admin/doctor/account/*') ? 'active' : '' }}" href="{{ route("admin.doctor.account") }}">
                    <i class="far fa-user fa-lg "></i>
                    <span class="nav-link-text text-uppercase">Manage Account</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('admin/doctor/appointments') || request()->is('admin/doctor/appointments/*') ? 'active' : '' }}" href="{{ route("admin.doctor.appointment") }}">
                    <i class="far fa-list-alt fa-lg "></i>
                    <span class="nav-link-text text-uppercase">Manage Appointment</span>
                  </a>
                </li>
              @endif
              

           

              
          </ul>


        </div>

      </div>
    </div>
  </nav>