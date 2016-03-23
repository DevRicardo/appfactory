<div class="row">
        <div class="input-field col s12 m12 l12 name">
          {!! csrf_field() !!}  
          {!! Form::text('name',null, ['id'=>'name', 'data-validate'=>'required text']) !!}       
          <label for="name">Name table</label>
          <span class='helper-error'><ul></ul></span>

        </div>
        
      </div>
      
      <div class="row">
        <div class="input-field col s12 m12 l12 description">
         
          {!! Form::textarea('description',null, ['id'=>'description', 'data-validate'=>'required text', 'class'=>'materialize-textarea']) !!} 
          <label for="description">Description</label>
          <span class='helper-error'><ul></ul></span>
        </div>
      </div>
