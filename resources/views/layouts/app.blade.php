
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{asset('materialize/css/materialize.min.css')}}"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <title>Funds Transfer</title>
    </head>

    <body>
    <nav class=" teal darken-4">
        <div class="nav-wrapper">
        <!-- <a href="#" class="brand-logo">FT</a> -->
        </div>
    </nav>
    <div class="container">
      @yield('content')
    </div>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="{{asset('materialize/js/materialize.min.js')}}"></script>
    </body>
  </html>