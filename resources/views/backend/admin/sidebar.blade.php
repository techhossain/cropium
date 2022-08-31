<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="/storage/images/users/{{ auth()->user()->photo }}" alt="profile image">
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
            <li class="nav-item">
              <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tags</a>
            </li>
          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Basic UI Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
            </li>
          </ul>
        </div>
      </li>
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

    </ul>
  </nav>