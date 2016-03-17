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
    {!! Html::style("bower_components/animate.css/animate.css") !!}
    {!! Html::style("css/main.css") !!}

    <!-- Styles -->
    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body>
 <body data-url="{{URL::to('/')}}">
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
     
      <form id="f_search" style="display: none;">
        <div class="input-field">
          <input id="search" type="search" placeholder="Buscar proyecto" required>
          <label id="l_search" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons i_search">close</i>
        </div>
      </form>

      <a href="#!" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      <ul class="right hide-on-med-and-down menu-large">
        <li>@yield('search')</li>        
        <li><a href="{!! url('') !!}">Register</a></li>
        <li><a href="{!! url('') !!}">Contact</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="menu_personal">
        
        <div class="chip z-depth-1">
            <img src="#" alt="Contact Person">
            {{ Auth::user()->name }}
        </div>

        <i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
         <li>        
        <div class="chip z-depth-1">
            <img title="{{ Auth::user()->name }}" src="#" alt="{{ Auth::user()->name }}">
            {{ Auth::user()->name }}
        </div>
      </li>


      <li class="divider"></li> 

        <li>
        
            <form id="mf_search">
              <div class="input-field">
                <input id="search" type="search" placeholder="Buscar proyecto" required>
                <label id="ml_search" for="search"><i class="material-icons ">search</i></label>
                <i class="material-icons mi_search">close</i>
              </div>
            </form>      

        </li>
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

  <!--  seccion para notificaciones por default  -->
  <div id="dashboard-messge"> 

  </div>

  
 
    <div class="container">
    
    @yield('menu_floating')
       

    @yield('content')    



    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    {!! Html::script("bower_components/underscore/underscore.js") !!}
    {!! Html::script("bower_components/is_js/is.js") !!}
    {!! Html::script("bower_components/moment/moment.js") !!}    
    {!! Html::script("bower_components/noty/js/noty/packaged/jquery.noty.packaged.js") !!}
    {!! Html::script("js/materialize.js") !!}
    {!! Html::script("js/init.js") !!}
    {!! Html::script("js/base.js") !!}
    <!--- Ayudantes js (Funciones genericas para la interacion con javascript)  -->
    {!! Html::script("js/Helpers/HelperMessage.js") !!}
    {!! Html::script("js/Helpers/HelperForm.js") !!}
    {!! Html::script("js/Helpers/HelperValidation.js") !!}
    {!! Html::script("js/Helpers/HelperForm.js") !!}
    {!! Html::script("js/Helpers/HelperServerPetition.js") !!}

    


    <script type="text/javascript">
    
        $(document).ready(function() {
            $('select').material_select();
        });


    </script>
    <!--  Escripts añadodos por cada vista  -->
    @yield('scripts')
    </div>
</body>

</html>