<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="{{ route('home') }}/storage/images/{{ auth()->user()->photo }}" alt="profile image">
            <div class="dot-indicator bg-success"></div>
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{ auth()->user()->name }}</p>
            <p class="designation">Premium user</p>
          </div>
        </a>
      </li>
      <li class="nav-item nav-category">Main Menu</li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#posts" aria-expanded="false" aria-controls="posts">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Posts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="posts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('posts.index')}}">All Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('posts.create')}}">Add New</a>
            </li>
            @if(auth()->user()->is_admin)
            <li class="nav-item">
              <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tags</a>
            </li>
            @endif
          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Users</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="users">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('users.index')}}">All Users</a>
            </li>
            @if(auth()->user()->is_admin)
            <li class="nav-item">
              <a class="nav-link" href="{{route('users.create')}}">Add New</a>
            </li>
            @endif
          </ul>
        </div>
      </li>
      @if(auth()->user()->is_admin)
      <li class="nav-item">
        <a class="nav-link" href="pages/forms/basic_elements.html">
          <i class="menu-icon typcn typcn-shopping-bag"></i>
          <span class="menu-title">Form elements</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartjs.html">
          <i class="menu-icon typcn typcn-th-large-outline"></i>
          <span class="menu-title">Charts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <i class="menu-icon typcn typcn-bell"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      @endif

    </ul>
  </nav>