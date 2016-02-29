@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('content')

 
 
<div class="list_projects">
    <div class="indicador_carga"></div>      
   
</div>


@stop

@section('scripts')

     @include('projects::partial.script')

@stop