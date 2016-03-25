@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('content')

 <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    
     <a href="{!! url('ponds/create') !!}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>

 </div>

 <div class="card-panel">
<blockquote>
    <h4>Dimensiones del cuerpo de agua</h4>
</blockquote>
{!! Form::open(['url'=>'ponds', 'method'=>'GET', 'class' => 'col s12 card-panel  search']) !!}
<div class="row">
   <div class="col l3 m3 s3">
     
    <div class='input-field siembra'> 

       {!! Form::select('siembra', [''=>'Seleccione','Intensiva'=>'Intensiva', 'Super Intensiva'=>'Super Intensiva'], null, ['id'=>'siembra', 'data-validate'=>'']) !!} 
        <label for='description'>Siembra</label>
        <span class='helper-error'><ul></ul></span>
    </div>

   </div>

   <div class="col l3 m3 s3">

    <div class='input-field fase'> 

       {!! Form::select('phase_id', $phases, null, ['id'=>'siembra', 'data-validate'=>'']) !!} 
        <label for='description'>Fase</label>
        <span class='helper-error'><ul></ul></span>
    </div>
     
   </div>

   <div class="col l3 m3 s3">
     <div class='input-field cultivo'> 

       {!! Form::select('crop_id', $crops, null, ['id'=>'siembra', 'data-validate'=>'']) !!} 
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


<div class="list_ponds">
    <div class="indicador_carga"></div>      
   
</div>
</div>

@stop

@section('scripts')

     @include('ponds::partial.script')

@stop
