@extends('layouts.home')

@section('search')
   @include('partials.button_search');
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
           Create 
       </a>
       
  </div>
  
</div>      
  


<div class="">
    <br>
    
  <div class="row">
    <form class="col s12 card-panel z-depth-1 grey lighten-3">

    <blockquote>
      <h5>Create new proyect</h5>
    </blockquote>

      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" id="name" type="text" class="validate">
          <label for="name">Name project</label>
        </div>
        <div class="input-field col s6">

           <div class="file-field input-field" style="margin-top: 0px;">
             <div class="btn">
               <span>Image</span>
               <input type="file" id="image" name="image">
             </div>
             <div class="file-path-wrapper">
               <input class="file-path validate" type="text">
             </div>
           </div>       
          
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <textarea id="description" class="validate materialize-textarea"></textarea>
          <label for="description">Description</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s6">
          <select>
            <option value="" disabled selected>Choose your categorie</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label>Categorie</label>
        </div>

        <div class="input-field col s6">
          <select class="icons">
            <option value="" disabled selected>Choose the state</option>
            <option value=""><span  class=" amber-text  text-lighten-2">example 1</span></option>
            <option value="">example 2</option>
            <option value="">example 3</option>
          </select>
          <label>State</label>
        </div>

      </div>
    </form>
  </div>

</div>    

@stop

