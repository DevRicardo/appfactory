@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@endsection

@section('content')

<div class="col s12 m12 l12">
<br>
  <div class="chip teal lighten-4 z-depth-1 hoverable">
<<<<<<< HEAD:modules/Books/Resources/views/create.blade.php
        <a href="{!! url('/books') !!}">
            books 
=======
        <a href="{!! url('/offices') !!}">
            offices 
>>>>>>> appf/ts1:public/Generator/55/Offices/Resources/views/create.blade.php
            <i class="material-icons">keyboard_arrow_right</i>
        </a>
        
  </div>
  <div class="chip teal lighten-4 z-depth-1">
<<<<<<< HEAD:modules/Books/Resources/views/create.blade.php
       <a href="{!! url('/books/create') !!}">
=======
       <a href="{!! url('/offices/create') !!}">
>>>>>>> appf/ts1:public/Generator/55/Offices/Resources/views/create.blade.php
           Create 
       </a>
       
  </div>
  
</div>      
  


<div class="">
    <br>
    
  <div class="row">
    
<<<<<<< HEAD:modules/Books/Resources/views/create.blade.php
    {!! Form::open(['url'=>'books', 'method'=>'POST', 'class' => 'col s12 card-panel z-depth-1 grey lighten-3 create','enctype'=>'multipart/form-data']) !!}
    
    <blockquote>
      <h5>Create new Book</h5>
    </blockquote>

    @include('books::fields')
=======
    {!! Form::open(['url'=>'offices', 'method'=>'POST', 'class' => 'col s12 card-panel  create','enctype'=>'multipart/form-data']) !!}
    
    <blockquote>
      <h5>Create new Office</h5>
    </blockquote>

    @include('offices::fields')
>>>>>>> appf/ts1:public/Generator/55/Offices/Resources/views/create.blade.php
   

    <div class="input-field col s6" style="margin-bottom: 18px;">
        <input type="submit" class="btn waves-effect waves-light blue lighten-1" value="Create" />
    </div>
    <br>
    {!! Form::close() !!}
  </div>

</div>    

@stop

@section('scripts')

<<<<<<< HEAD:modules/Books/Resources/views/create.blade.php
     @include('books::partial.script')
=======
     @include('offices::partial.script')
>>>>>>> appf/ts1:public/Generator/55/Offices/Resources/views/create.blade.php

@stop

