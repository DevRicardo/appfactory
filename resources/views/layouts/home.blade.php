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

 <ul id="menu_personal" class="dropdown-content">
     
     <li>
       <a href="#!">
         <i class="material-icons tyni left">settings</i>
         Configuración
       </a>
     </li>
     <li class="divider"></li> 
     <li>
       <a href="{!! url('autentication/logout') !!}"><i class="tiny material-icons left">exit_to_app</i>
         Terminar sesión
       </a>
     </li>
 </ul>
  <nav class="teal accent-4">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">EP-001</a>
      <a href="#!" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="{!! url('') !!}">Register</a></li>
        <li><a href="{!! url('') !!}">Contact</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="menu_personal">
        
        <div class="chip">
            <img src="http://ofertas.rogersoto.com/images/avatar.png" alt="Contact Person">
            {{ Auth::user()->name }}
        </div>

        <i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
         <li>        
        <div class="chip">
            <img src="http://ofertas.rogersoto.com/images/avatar.png" alt="Contact Person">
            {{ Auth::user()->name }}
        </div>
      </li>
      <li class="divider"></li> 
        <li><a href="{!! url('') !!}">Register</a></li>
        <li><a href="{!! url('') !!}">Contact</a></li>
        <li>
       <a href="#!">
         <i class="material-icons tyni left">settings</i>
         Configuración
       </a>
     </li>
     
     <li>
       <a href="{!! url('autentication/logout') !!}"><i class="tiny material-icons left">exit_to_app</i>
         Terminar sesión
       </a>
     </li>
     
      </ul>
    </div>
  </nav>

  
 <!-- <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">Logo</a>
      
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
      <ul class="side-nav" id="slide-out">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>-->

    <div class="container">
        <!-- Page Content goes here -->
       

    @yield('content')    



    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    {!! Html::script("js/materialize.js") !!}
    {!! Html::script("js/init.js") !!}
    </div>
</body>

</html>