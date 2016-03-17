@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('menu_floating')
         <!-- Page Content goes here -->
       
         <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
      <i class="large mdi-navigation-menu"></i>
    </a>
    <ul>
       
      <li><a href="#" onclick="addField()"  class="btn-floating blue"><i class="material-icons">add</i></a></li>
    </ul>
  </div>
    
@stop
@section('content')

<div class="col s12 m12 l12">
<br>

<div class="chip teal lighten-4 z-depth-1 hoverable">
        <a href="{!! url('/generator/'.$projects.'/'.$projects_name) !!}">
            Projects 
            <i class="material-icons">keyboard_arrow_right</i>
        </a>
        
  </div>
  <div class="chip teal lighten-4 z-depth-1 hoverable">
        <a href="{!! url('/generator/'.$projects.'/'.$projects_name) !!}">
            {!! $projects_name !!}
            <i class="material-icons">keyboard_arrow_right</i>
        </a>
        
  </div>
  <div class="chip teal lighten-4 z-depth-1 hoverable">
        <a href="{!! url('/generator/'.$projects.'/'.$projects_name) !!}">
            Tables 
            <i class="material-icons">keyboard_arrow_right</i>
        </a>
        
  </div>
  <div class="chip teal lighten-4 z-depth-1">
       <a href="#">

           
           
           <strong>{!! $table !!}</strong>

       </a>
       
  </div>
  
</div> 
<br>


    {!! Form::open(['url'=>'/generator/fields', 'method'=>'POST', 'class' => 'col s12 create_field']) !!}
    <input type="hidden" id="idtable" name="idtable" value="{!! $idtable !!}">
    <div class="col s12 m12 l12 card-panel z-depth-1 grey lighten-3" >
    <?php $pos = 0;  ?>
      @foreach ($fields as $value)

           <div class="row row_field" >

        <div class="input-field col s2">          
          <input id="name_{!! $pos !!}" name="row_{!! $pos !!}[]" value="{!! $value->name !!}" type="text" class="validate">
          <label for="name">Name</label>
        </div>

        

        <div class="input-field col s2">
          {!!  Form::select('row_'.$pos.'[]', [
              'string'=> 'string',
              'integer'=> 'integer',
              'date'=> 'date'            

         ], $value->type,[
             
             'id'=> 'type_'.$pos

         ]) !!}
        
          <label for="type">Type</label>
        </div>

        <div class="input-field col s2">
          <input type="number" name="row_{!! $pos !!}[]" id="length_{!! $pos !!}" value="{!! $value->length !!}" class="validate">
          <label for="length">Length</label>
        </div>
       
        <div class="input-field col s2">
         {!!  Form::select('row_'.$pos.'[]', [
              'input:text'=> 'input:text',
              'input:email'=> 'input:email',
              'input:number'=> 'input:number',
              'input:date'=> 'input:date',
              'input:url'=> 'input:url',
              'textarea'=> 'textarea',
              'select'=> 'select',
              'radio'=> 'radio',
              'chackbox'=> 'chackbox'

         ], $value->html_component,[
             
             'id'=> 'html_component_'.$pos

         ]) !!}
        
          <label for="component">Component</label>
        </div>

        <div class="input-field col s1">

        <a href="#" onclick="addAttr(this)" class="waves-effect waves-light" title="Attributes" data-id="{!! $pos !!}">
        <i  class="small material-icons">list</i>
        </a>

          <input  id="attributes_{!! $pos !!}" value="{!! $value->attributes !!}"  name="row_{!! $pos !!}[]" type="hidden" class="validate" >
          
        </div>

        <div class="input-field col s1">
        
        <a href="#" onclick="addValidation(this)" class="waves-effect waves-light" title="Validations" data-id="{!! $pos !!}">
        <i  class="small material-icons">lock_outline</i>
        </a>
          <input  name="row_{!! $pos !!}[]" value="{!! $value->validations !!}" id="validations_{!! $pos !!}" type="hidden" class="validate">
          
        </div>
        
      </div>

      <?php $pos ++;  ?>
      @endforeach
    	 
    </div> 
    <div class="input-field col s6" style="margin-bottom: 18px;">
        <input type="submit" class="btn waves-effect waves-light blue lighten-1" value="Create" />
    </div>
    {!! Form::close() !!}


     <!-- Modal Trigger -->
 

  <!--     Modal Structure agregate attribute     -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      
      <div class="row">
      <div class="input-field col s2">
          <select  name="m_type" id="m_type"  class="validate">
              <option value="class">class</option>
              <option value="data">data</option>
              <option value="style">style</option>
          </select>
          <label for="length">Type</label>
        </div>
        <div class="input-field col s6">
          <input type="text" name="m_value" id="m_value" value="" class="validate">
          <label for="length">Value</label>
        </div>
      
        <div class="input-field col s4">
          <a href="#!" onclick="addValueModalAttr()" class="waves-effect waves-green btn ">Agree</a>
        </div>
        <input type="hidden" name="field_select" id="field_select" value="">
      </div>
        
        <div class="row">

            <div class="col s12 m12 l12 input-field">
                 <textarea id="text_value" name="text_value" class="materialize-textarea"></textarea>
                 <label for="length">Value</label>
            </div>
            
          
        </div>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
    </div>
  </div>

  <!-- Modal Structure -->
  <div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
      
      <div class="row">
      
        <div class="input-field col s8">
          <input type="text" name="v_value" id="v_value" value="" class="validate">
          <label for="length">Value</label>
        </div>
      
        <div class="input-field col s4">
          <a href="#!" onclick="addValueModalValidation()" class="waves-effect waves-green btn ">Agree</a>
        </div>
        <input type="hidden" name="v_field_select" id="v_field_select" value="">
      </div>
        
        <div class="row">

            <div class="col s12 m12 l12 input-field">
                 <textarea id="v_text_value" name="v_text_value" class="materialize-textarea"></textarea>
                 <label for="length">Value</label>
            </div>
            
          
        </div>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
    </div>
  </div>
   


<script type="text/javascript">
        $('select').material_select();
    </script>
@stop

@section('scripts')

     @include('generator::partial.script')

@stop