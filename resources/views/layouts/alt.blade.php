
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{asset('materialize/css/materialize.min.css')}}"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="{{asset('icons/css/all.css')}}"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="{{asset('css/custom.css')}}"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <title>Demo - @yield('title')</title>
    </head>

    <body>
    <nav class="grey darken-4">
        <div class="nav-wrapper">
        <!-- <a href="#" class="brand-logo">FT</a> -->
        </div>
    </nav>
      @section('sidebar')
          @include('layouts/sidenav')
      @show
      @yield('content')
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
      <script type="text/javascript" src="{{asset('materialize/js/materialize.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
    </body>
  </html>