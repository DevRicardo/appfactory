@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('content')

 <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    
     <a href="{!! url('crops/create') !!}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>

 </div>

 <div class="card-panel">
<blockquote>
    <h4>List Crop</h4>
</blockquote>


<div class="list_crops">
    <div class="indicador_carga"></div>      
   
</div>
</div>

@stop

@section('scripts')

     @include('crops::partial.script')

@stop
