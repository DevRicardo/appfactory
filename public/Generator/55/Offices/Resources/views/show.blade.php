@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@endsection

@section('content')

<div class="col s12 m12 l12">
<br>
  <div class="chip teal lighten-4 z-depth-1 hoverable">
        <a href="{!! url('/offices') !!}">
            Offices 
            <i class="material-icons">keyboard_arrow_right</i>
        </a>
        
  </div>
  <div class="chip teal lighten-4 z-depth-1">
       <a href="{!! url('/offices/create') !!}">
           Show 
       </a>
       
  </div>
  
</div>      
  


<div class="">
    <br>
    
  <div class="row">
    
    {!! Form::model($office, ['url'=>'offices/'.$office->id, 'method'=>'PUT', 'class' => 'col s12 card-panel  update','name'=>'update_offices','enctype'=>'multipart/form-data']) !!}
     <blockquote>
      <h5>Info Office</h5>
    </blockquote>
   
    @include('offices::fields')
   

    <div class="input-field col s6" style="margin-bottom: 18px;">
        
    </div>
    <br>
    {!! Form::close() !!}
  </div>

</div>    

@stop

@section('scripts')

     @include('offices::partial.script')
    
     <script type="text/javascript">
       
         $("#name").attr('readonly','readonly');   
         $("input").attr('readonly','readonly');  
         $("select").attr('readonly','readonly');
         $("textarea").attr('readonly','readonly');    
    
     </script>

@stop

