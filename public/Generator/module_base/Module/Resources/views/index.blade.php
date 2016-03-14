@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('content')

 
 
<div class="list_$_table_$">
    <div class="indicador_carga"></div>      
   
</div>


@stop

@section('scripts')

     @include('$_table_$::partial.script')

@stop