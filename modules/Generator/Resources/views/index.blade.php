@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('content')

<div class="col s12 m12 l12">
<br>
  <div class="chip teal lighten-4 z-depth-1 hoverable">
        <a href="{!! url('/projects') !!}">
            Projects 
            <i class="material-icons">keyboard_arrow_right</i>
        </a>
        
  </div>
  <div class="chip teal lighten-4 z-depth-1">
       <a href="#">
           List Tables 
       </a>
       
  </div>
  
</div> 
<br>
<div class="row">
    
    <div class="col s12 card-panel z-depth-1 grey lighten-3" >
    	dfsdfsdfsd
    </div> 
   
  </div>

 
<div class="list_generator">
    <div class="indicador_carga"></div>      
   
</div>


@stop

@section('scripts')

     @include('generator::partial.script')

@stop