@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@endsection

@section('content')

<div class="col s12 m12 l12">
<br>
  <div class="chip teal lighten-4 z-depth-1 hoverable">
        <a href="{!! url('/phases') !!}">
            Phases 
            <i class="material-icons">keyboard_arrow_right</i>
        </a>
        
  </div>
  <div class="chip teal lighten-4 z-depth-1">
       <a href="{!! url('/phases/create') !!}">
           Show 
       </a>
       
  </div>
  
</div>      
  


<div class="">
    <br>
    
  <div class="row">
    
    {!! Form::model($phase, ['url'=>'phases/'.$phase->id, 'method'=>'PUT', 'class' => 'col s12 card-panel  update','name'=>'update_phases','enctype'=>'multipart/form-data']) !!}
     <blockquote>
      <h5>Info Phase</h5>
    </blockquote>
   
    @include('phases::fields')
   

    <div class="input-field col s6" style="margin-bottom: 18px;">
        
    </div>
    <br>
    {!! Form::close() !!}
  </div>

</div>    

@stop

@section('scripts')

     @include('phases::partial.script')
    
     <script type="text/javascript">
       
         $("#name").attr('readonly','readonly');   
         $("input").attr('readonly','readonly');  
         $("select").attr('readonly','readonly');
         $("textarea").attr('readonly','readonly');    
    
     </script>

@stop

