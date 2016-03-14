@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@endsection

@section('content')

<div class="col s12 m12 l12">
<br>
  <div class="chip teal lighten-4 z-depth-1 hoverable">
        <a href="{!! url('/projects') !!}">
            Projects 
            <i class="material-icons">keyboard_arrow_right</i>
        </a>
        
  </div>
  <div class="chip teal lighten-4 z-depth-1">
       <a href="{!! url('/projects/create') !!}">
           Edit 
       </a>
       
  </div>
  
</div>      
  


<div class="">
    <br>
    
  <div class="row">
    
    {!! Form::model($project, ['url'=>'projects/'.$project->id, 'method'=>'PUT', 'class' => 'col s12 card-panel z-depth-1 grey lighten-3 update','name'=>'update_projects','enctype'=>'multipart/form-data']) !!}
    
    <div class="card-image waves-effect waves-block waves-light  center-align" style="height: 100px;">
        <span class="grey-text text-darken-4 close-preview" style="display:none;" >
                    <i class="material-icons right">close</i>                    
        </span>
        <img class="responsive-img" src="{!! url('storage/'.$project->image) !!}">
    </div>
    <hr>
    @include('projects::fields')
   

    <div class="input-field col s6" style="margin-bottom: 18px;">
        <input type="submit" class="btn waves-effect waves-light blue lighten-1" value="Update" />
    </div>
    <br>
    {!! Form::close() !!}
  </div>

</div>    

@stop

@section('scripts')

     @include('projects::partial.script')
    
     <script type="text/javascript">
       
         $("#name").attr('readonly','readonly');   
    
     </script>

@stop

