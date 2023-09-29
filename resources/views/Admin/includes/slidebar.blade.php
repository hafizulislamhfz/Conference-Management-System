<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/dashboard')?'':'collapsed'; }}" href="{{ url('admin/dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('admin/categories','admin/conference')?'':'collapsed'; }}" data-bs-target="#conference-item" data-bs-toggle="collapse" href="{{ url('admin/conference') }}">
        <i class="bi bi-layout-text-window-reverse"></i>
            <span>Conferences</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="conference-item" class="nav-content collapse {{ Request::is('admin/categories','admin/conference')?'show':''; }}" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ url('admin/conference') }}"  class="{{ Request::is('admin/conference')?'active':''; }}">
            <i class="bi bi-bar-chart"></i><span>All Conferences</span>
          </a>
        </li>
        <li>
          <a href="{{ url('admin/categories') }}" class="{{ Request::is('admin/categories')?'active':''; }}">
            <i class="bi bi-tags"></i><span>Categories</span>
          </a>
        </li>
      </ul>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/categories')?'collapsed':''; }}" href="{{ url('admin/categories') }}">
          <i class="bi bi-tags"></i>
          <span>Categories</span>
        </a>
    </li> --}}

    <li class="nav-item">
      <a class="nav-link {{ Request::is('admin/users')?'':'collapsed'; }}" href="{{ url('admin/users') }}">
        <i class="bi-people-fill"></i>
        <span>Users</span>
      </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/profile')?'':'collapsed'; }}" href="{{ url('admin/profile') }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav --><!-- End users Page Nav -->
  </ul>

</aside><!-- End Sidebar-->

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            
        });
    </script>
@endpush
