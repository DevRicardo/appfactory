@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('menu_floating')
         <!-- Page Content goes here -->
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    
      <a href="{!! url('projects/create') !!}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>

  </div>
@stop

@section('content')

 
 
<div class="list_projects">
    <div class="indicador_carga"></div>      
   
</div>


@stop

@section('scripts')

     @include('projects::partial.script')

@stop