@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('content')

 
 
<div class="list_books">
    <div class="indicador_carga"></div>      
   
</div>


@stop

@section('scripts')

     @include('books::partial.script')

@stop
