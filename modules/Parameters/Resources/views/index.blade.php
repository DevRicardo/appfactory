@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('content')

 <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    
     <a href="{!! url('parameters/create') !!}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>

 </div>

 <div class="card-panel">
<blockquote>
    <h4>List Parameter</h4>
</blockquote>

{!! Form::open(['url'=>'parameters', 'method'=>'GET', 'class' => 'col s12 card-panel  search']) !!}
<div class="row">
  
   <div class="col l3 m3 s3">

    <div class='input-field fase'> 

       {!! Form::select('name', $select, null, ['id'=>'name', 'data-validate'=>'']) !!} 
        <label for='description'>Parametro</label>
        <span class='helper-error'><ul></ul></span>
    </div>
     
   </div>

   <div class="col l3 m3 s3">
     <div class='input-field cultivo'> 

       {!! Form::select('crop_id', $crops, null, ['id'=>'crop_id', 'data-validate'=>'']) !!} 
        <label for='description'>Cultivo</label>
        <span class='helper-error'><ul></ul></span>
    </div>
   </div>

   <div class="col l3 m3 s3">
   <br>
   <input type="submit" class="btn" value="BUSCAR">
     
   </div>
</div>

{!! Form::close() !!}


<div class="list_parameters">
    <div class="indicador_carga"></div>      
   
</div>
</div>

@stop

@section('scripts')

     @include('parameters::partial.script')

@stop
