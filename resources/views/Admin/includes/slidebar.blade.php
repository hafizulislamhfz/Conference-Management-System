<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link {{ Request::is('admin/pannel')?'collapsed':''; }}" href="{{ url('admin/pannel') }}">
        <i class="bi bi-grid"></i>
        <span>Conferences</span>
      </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/categories')?'collapsed':''; }}" href="{{ url('admin/categories') }}">
          <i class="bi bi-tags"></i>
          <span>Categories</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link {{ Request::is('admin/users')?'collapsed':''; }}" href="{{ url('admin/users') }}">
        <i class="bi-people-fill"></i>
        <span>Users</span>
      </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/profile')?'collapsed':''; }}" href="{{ url('admin/profile') }}">
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
