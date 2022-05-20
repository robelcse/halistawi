<header class="main-nav">
      <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{ asset('/assets/images/dashboard/1.png') }}" alt="">
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">
          <h6 class="mt-3 f-14 f-w-600"></h6>
        </a>
        <p class="mb-0 font-roboto">Name</p>
        <ul>
          <li><span><span class="counter">19.8</span>k</span>
            <p>Follow</p>
          </li>
          <li><span>2 year</span>
            <p>Experince</p>
          </li>
          <li><span><span class="counter">95.2</span>k</span>
            <p>Follower </p>
          </li>
        </ul>
      </div>
      <nav>
        <div class="main-navbar">
          <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
          <div id="mainnav">
            <ul class="nav-menu custom-scrollbar">
              <li class="back-btn">
                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
              </li>
              <li class="sidebar-main-title">
                <div>
                  <h6>Configuration </h6>
                </div>
              </li>
              <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ url('config')}}"><i data-feather="monitor"></i><span>Integration</span></a></li>
              
              <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="layers"></i><span>Learning</span></a>
                <ul class="nav-submenu menu-content">
                  <li><a href="learning-list-view.html">Learning List</a></li>
                  <li><a href="learning-detailed.html">Detailed Course</a></li>
                </ul>
              </li>
              <li><a class="nav-link menu-title link-nav" href="{{ url('shops')}}"><i data-feather="monitor"></i><span>Shops</span></a></li>
              <li><a class="nav-link menu-title link-nav" href="{{ url('products')}}"><i data-feather="monitor"></i><span>Products</span></a></li>
              <li><a class="nav-link menu-title link-nav" href="{{ url('customers')}}"><i data-feather="monitor"></i><span>Customers</span></a></li>
              <li><a class="nav-link menu-title link-nav" href="{{ url('orders')}}"><i data-feather="monitor"></i><span>Orders</span></a></li>
              <li><a class="nav-link menu-title link-nav" href="support-ticket.html"><i data-feather="headphones"></i><span>Support Ticket</span></a></li>
            </ul>
          </div>
          <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
      </nav>
    </header>