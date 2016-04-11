@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('content')

<<<<<<< HEAD:modules/Books/Resources/views/index.blade.php
 
 
<div class="list_books">
=======
 <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    
     <a href="{!! url('offices/create') !!}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>

 </div>

 <div class="card-panel">
<blockquote>
    <h4>List Office</h4>
</blockquote>


<div class="list_offices">
>>>>>>> appf/ts1:public/Generator/55/Offices/Resources/views/index.blade.php
    <div class="indicador_carga"></div>      
   
</div>
</div>

@stop

@section('scripts')

<<<<<<< HEAD:modules/Books/Resources/views/index.blade.php
     @include('books::partial.script')
=======
     @include('offices::partial.script')
>>>>>>> appf/ts1:public/Generator/55/Offices/Resources/views/index.blade.php

@stop
