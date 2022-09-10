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
            <p class="designation">{{ auth()->user()->getRoleNames() ? ucfirst( auth()->user()->getRoleNames()[0] ) : 0  }}</p>
          </div>
        </a>
      </li>
      <li class="nav-item nav-category">Main Menu</li>

    @if(!auth()->user()->cannot('posts'))
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

              @if(!auth()->user()->cannot('categories'))

              <li class="nav-item">
                <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
              </li>

              @endif

            </ul>
          </div>
        </li>

        @if(!auth()->user()->cannot('users'))
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

                <li class="nav-item">
                  <a class="nav-link" href="{{route('users.create')}}">Add New</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon typcn typcn-shopping-bag"></i>
              <span class="menu-title">Customers</span>
            </a>
          </li>
        @endif

    @endif

      <li class="nav-item">
        <a class="nav-link" href="{{route('user.profile')}}">
          <i class="dropdown-item-icon ti-dashboard"></i>
          <span class="menu-title">Manage Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('notification')}}">
          <i class="dropdown-item-icon ti-dashboard"></i>
          <span class="menu-title">Notifications</span>
        </a>
      </li>

    </ul>
  </nav>