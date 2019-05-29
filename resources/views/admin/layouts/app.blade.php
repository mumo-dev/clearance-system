<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
   
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
       

    <nav class="navbar navbar-dark fixed-top bg-success flex-md-nowrap p-0 shadow" >
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Egerton Clearance System
      </a>
         @yield('header-title')
      {{-- <h6 class="text-white text-uppercase">Admin Dashboard</h6> --}}
      <ul class="navbar-nav px-3">

        <li class="nav-item text-nowrap">
          <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}</a>
        </li>

        
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </ul>
    </nav>


    <div class="container-fluid">
      <div class="row">
        
        @yield('sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-2">
           @yield('content')
        </main>
      </div>
    </div>


  </div>
   <script src="{{ asset('js/app.js') }}"></script>
  <!-- Icons -->
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script>
      feather.replace()
    </script>

    <script>
   
       $("input[name='is_academic']").click(function() {
          var status = $(this).val();
          if (status == 'academic') {
              $('#faculty').addClass("d-block");
          } else {
              $('#faculty').removeClass("d-block");
          }
      });

  </script>

    
</body>
</html>

