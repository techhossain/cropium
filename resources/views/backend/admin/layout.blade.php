<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ isset($title) ? $title : env('APP_NAME') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.addons.css') }}">
    <!-- End plugin css for this page -->
    
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/shared/style.css') }}">
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo_1/style.css') }}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}" />
  </head>
  <body>

    <div class="container-scroller">
        <!-- top nav -->
        @include('backend.admin.top')

          <div class="container-fluid page-body-wrapper">
              <!-- sidenav-->
              @include('backend.admin.sidebar')
              
              <div class="main-panel">
                  <!-- Main Content -->
                  @yield('content')
                  <!-- Footer -->
                  @include('backend.admin.bottom')
              </div>
          </div>
    </div>

    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
    <script src="{{ asset('admin/assets/js/shared/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/shared/misc.js') }}"></script>
    <script src="{{ asset('admin/assets/js/demo_1/dashboard.js') }}"></script>
    <script src="{{ asset('admin/assets/js/shared/jquery.cookie.js') }}"></script>
  </body>
</html>