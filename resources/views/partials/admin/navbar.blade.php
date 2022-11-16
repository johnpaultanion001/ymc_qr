<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item text-uppercase"><a href="/admin/home")><i class="ni ni-tv-2 mr-2 "></i>Home</a></li>
                <li class="breadcrumb-item active text-uppercase" aria-current="page">
                @if(request()->is('admin/home'))
                  Home
                @elseif(request()->is('admin/patient_list'))
                    Patients
                @elseif(request()->is('admin/events') || request()->is('admin/events/*'))
                    Events
                @elseif(request()->is('admin/students'))
                    Students
                @elseif(request()->is('admin/schedule_activities'))
                  Schedule & Activities
                @endif
                
                 
                 </li>
              </ol>
          </nav>
          
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none text-white">
              {{ trans('panel.site_title') }}
            </li>
            
            
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                
                    <!-- <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg"> -->
                    
                    <span class="mb-0 text-sm  font-weight-bold text-uppercase">{{ Auth::user()->name }} / {{ Auth::user()->role }}</span>
                    <i class="fas fa-chevron-down pl-2"></i>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title text-uppercase">
                  <h6 class="text-overflow m-0">NAME: {{ Auth::user()->name }} </h6> <hr class="my-1">
                  <h6 class="text-overflow m-0">ROLE: {{ Auth::user()->role }} </h6>
                 
                </div>
              
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item"  onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="fas fa-sign-out-alt fa-lg p-2"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
