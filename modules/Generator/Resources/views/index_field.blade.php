@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('menu_floating')
         <!-- Page Content goes here -->
       
         <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
      <i class="large mdi-navigation-menu"></i>
    </a>
    <ul>
       
      <li><a href="#" onclick="addField()"  class="btn-floating blue"><i class="material-icons">add</i></a></li>
    </ul>
  </div>
    
@stop
@section('content')

<div class="col s12 m12 l12">
<br>
  <div class="chip teal lighten-4 z-depth-1 hoverable">
        <a href="{!! url('/generator/'.$projects.'/'.$projects_name) !!}">
            Tables 
            <i class="material-icons">keyboard_arrow_right</i>
        </a>
        
  </div>
  <div class="chip teal lighten-4 z-depth-1">
       <a href="#">

           
           
           <strong>{!! $table !!}</strong>

       </a>
       
  </div>
  
</div> 
<br>


    {!! Form::open(['url'=>'/generator/fields', 'method'=>'POST', 'class' => 'col s12 create_field']) !!}
    
    <div class="col s12 m12 l12 card-panel z-depth-1 grey lighten-3" >
    	 
    </div> 
    <div class="input-field col s6" style="margin-bottom: 18px;">
        <input type="submit" class="btn waves-effect waves-light blue lighten-1" value="Create" />
    </div>
    {!! Form::close() !!}
   



@stop

@section('scripts')

     @include('generator::partial.script')

@stop