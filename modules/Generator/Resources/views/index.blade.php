@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('content')

 
 {!! $projects !!}
<div class="list_generator">
    <div class="indicador_carga"></div>      
   
</div>


@stop

@section('scripts')

     @include('generator::partial.script')

@stop