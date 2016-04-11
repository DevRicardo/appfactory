@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@endsection

@section('content')

<div class="col s12 m12 l12">
<br>
  <div class="chip teal lighten-4 z-depth-1 hoverable">
<<<<<<< HEAD:modules/Books/Resources/views/edit.blade.php
        <a href="{!! url('/books') !!}">
            Projects 
=======
        <a href="{!! url('/offices') !!}">
            Offices 
>>>>>>> appf/ts1:public/Generator/55/Offices/Resources/views/edit.blade.php
            <i class="material-icons">keyboard_arrow_right</i>
        </a>
        
  </div>
  <div class="chip teal lighten-4 z-depth-1">
<<<<<<< HEAD:modules/Books/Resources/views/edit.blade.php
       <a href="{!! url('/books/create') !!}">
=======
       <a href="{!! url('/offices/create') !!}">
>>>>>>> appf/ts1:public/Generator/55/Offices/Resources/views/edit.blade.php
           Edit 
       </a>
       
  </div>
  
</div>      
  


<div class="">
    <br>
    
  <div class="row">
    
<<<<<<< HEAD:modules/Books/Resources/views/edit.blade.php
    {!! Form::model($book, ['url'=>'books/'.$book->id, 'method'=>'PUT', 'class' => 'col s12 card-panel z-depth-1 grey lighten-3 update','name'=>'update_books','enctype'=>'multipart/form-data']) !!}
    
   
    @include('books::fields')
=======
    {!! Form::model($office, ['url'=>'offices/'.$office->id, 'method'=>'PUT', 'class' => 'col s12 card-panel update','name'=>'update_offices','enctype'=>'multipart/form-data']) !!}
     <blockquote>
      <h5>Ediar new Office</h5>
    </blockquote>
   
    @include('offices::fields')
>>>>>>> appf/ts1:public/Generator/55/Offices/Resources/views/edit.blade.php
   

    <div class="input-field col s6" style="margin-bottom: 18px;">
        <input type="submit" class="btn waves-effect waves-light blue lighten-1" value="Update" />
    </div>
    <br>
    {!! Form::close() !!}
  </div>

</div>    

@stop

@section('scripts')

<<<<<<< HEAD:modules/Books/Resources/views/edit.blade.php
     @include('books::partial.script')
=======
     @include('offices::partial.script')
>>>>>>> appf/ts1:public/Generator/55/Offices/Resources/views/edit.blade.php
    
     <script type="text/javascript">
       
         $("#name").attr('readonly','readonly');   
    
     </script>

@stop

