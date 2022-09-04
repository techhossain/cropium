<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer - Cropium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>

    <header class="py-3 mb-3 border-bottom bg-primary">
        <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{ asset('/assets/images/logo.png') }}" alt="">
            </a>
            <ul class="dropdown-menu text-small shadow">
              <li><a class="dropdown-item active" href="#" aria-current="page">Overview</a></li>
              <li><a class="dropdown-item" href="#">Inventory</a></li>
              <li><a class="dropdown-item" href="#">Customers</a></li>
              <li><a class="dropdown-item" href="#">Products</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Reports</a></li>
              <li><a class="dropdown-item" href="#">Analytics</a></li>
            </ul>
          </div>
    
          <div class="d-flex align-items-center">
            <form class="w-100 me-3" role="search">
              <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
    
            <div class="flex-shrink-0 dropdown">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{route('home')}}/storage/images/{{auth('customer')->user()->photo}}" alt="mdo" width="32" height="32" class="rounded-circle">
              </a>
              <ul class="dropdown-menu text-small shadow">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="post" action="{{route('customer.logout')}}">
                        @csrf
                        <input type="submit" class="btn btn-link text-dark px-2" value="Logout">
                    </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </header>

      <div class="container">
        <div class="row">
            
            @yield('content')

        </div>
      </div>

    
    










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
  </body>
</html>