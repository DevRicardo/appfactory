<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>.:EP-001:.</title>

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {!! Html::style("css/materialize.css") !!}
    <!-- Styles -->
    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body>
 <nav class="teal accent-4">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">EP-001</a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="sass.html">Register</a></li>
        <li><a href="badges.html">Contact</a></li>
        
      </ul>
    </div>
  </nav>
    <div class="container">
        <!-- Page Content goes here -->
       

    @yield('content')    



    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    {!! Html::script("js/materialize.min.js") !!}
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    </div>
</body>

</html>
