<header class="main-nav">

  <div class="sidebar-user text-center">
    <a class="setting-primary" href=""><i data-feather="settings"></i></a>



    @if(Auth::user()->photo)
      <img class="img-90 rounded-circle" src="{{ asset('uploads/users/'.Auth::user()->photo) }}" alt="">
    @else
       <img class="img-90 rounded-circle" src="{{ asset('public/assets/images/dashboard/1.png') }}" alt="">
    @endif

    <div class="badge-bottom">
    </div><a href="user-profile.html">
      <h6 class="mt-3 f-14 f-w-600"></h6>
    </a>
    <p class="mb-0 font-roboto">{{ Auth::user()->name}}</p>

  </div>
  <nav>
    <div class="main-navbar">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="mainnav">
        <ul class="nav-menu custom-scrollbar">
          <li class="back-btn"></li>

          <li><a class="nav-link menu-title link-nav {{ Request::is('dashboard') ? 'actitve' : '' }}" href="{{ url('dashboard')}} "><i data-feather="home"></i><span>Dashboard</span></a></li>

          <li><a class="nav-link menu-title link-nav {{ Request::is('device*') ? 'actitve' : '' }}" href="{{ url('/device')}}"><i data-feather="tv"></i><span>Device</span></a></li>

          <li><a class="nav-link menu-title link-nav {{ Request::is('tstation*') ? 'actitve' : '' }}" href="{{ url('/tstation')}}"><i data-feather="server"></i><span>Test Station</span></a></li>

          <li><a class="nav-link menu-title link-nav {{ Request::is('admin*')  ? 'actitve' : '' }}" href="{{ route('admin.index') }}" href="{{ route('admin.index') }}"><i data-feather="slack"></i><span>Admin List</span></a></li>

          <li><a class="nav-link menu-title link-nav {{ Request::is('company*') ? 'actitve' : '' }}" href="{{ url('/company')}}"><i data-feather="grid"></i><span>Company</span></a></li>

          <li><a class="nav-link menu-title link-nav {{ Request::is('individual*') ? ' actitve' : '' }}" href="{{ url('/individual')}}"><i data-feather="folder"></i><span>Individual</span></a></li>


          <li><a class="nav-link menu-title link-nav {{ Request::is('ppbagent*') ? 'actitve' : '' }}" href="{{ url('/ppbagent')}}"><i data-feather="command"></i><span>PPB Agent</span></a></li>

          <li><a class="nav-link menu-title link-nav {{ Request::is('emergency-contact*') ? 'actitve' : '' }}" href="{{ url('/emergency-contact')}}"><i data-feather="phone-forwarded"></i><span>Emergency Contact</span></a></li>

          <li><a class="nav-link menu-title link-nav {{ Request::is('patient*')  ? 'actitve' : '' }}" href="{{ route('patient.list') }}"><i data-feather="users"></i><span>Patient List</span></a></li>

          <li><a class="nav-link menu-title link-nav {{ Request::is('doctor*')  ? 'actitve' : '' }}" href="{{ route('doctor.list') }}" href="{{ route('doctor.list') }}"><i data-feather="heart"></i><span>Doctor List</span></a></li>

        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </div>
  </nav>
</header>