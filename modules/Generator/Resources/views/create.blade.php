@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('menu_floating')
         <!-- Page Content goes here -->
   
    
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
           New table for
           <i class="material-icons">keyboard_arrow_right</i>
           <strong>{!! $projects_name !!}</strong>
       </a>
       
  </div>
  
</div> 
<br>

    
    <div class="row">
    
    {!! Form::open(['url'=>'generator', 'method'=>'POST', 'class' => 'col s12 card-panel z-depth-1 grey lighten-3 create','enctype'=>'multipart/form-data']) !!}
    
    <blockquote>
      <h5>Create new table</h5>
    </blockquote>

    @include('generator::fields')
    <input type="hidden" name="project_id" id="project_id" value="{!! $projects !!}">

    <div class="input-field col s6" style="margin-bottom: 18px;">
        <input type="submit" class="btn waves-effect waves-light blue lighten-1" value="Create" />
    </div>
    <br>
    {!! Form::close() !!}
  </div> 
   
  
 
<div class="list_generator">
    <div class="indicador_carga"></div>      
   
</div>


@stop

@section('scripts')

     @include('generator::partial.script')

@stop