<div class="row">
        <div class="input-field col s6 name">
          {!! csrf_field() !!}  
          {!! Form::text('name',null, ['id'=>'name', 'data-validate'=>'required text']) !!}       
          <label for="name">Name $_object_$</label>
          <span class='helper-error'><ul></ul></span>

        </div>
        <div class="input-field col s6 image">

           <div class="file-field input-field" style="margin-top: 0px;">
             <div class="btn">
               <span>Image</span>
               
               {!! Form::file('image',null, ['id'=>'image', 'data-validate'=>'required imagenFile']) !!}
             </div>
             <div class="file-path-wrapper">
               <input class="file-path validate" type="text">
             </div>
           </div>       
          <span class='helper-error'><ul></ul></span>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12 description">
         
          {!! Form::textarea('description',null, ['id'=>'description', 'data-validate'=>'required text', 'class'=>'materialize-textarea']) !!} 
          <label for="description">Description</label>
          <span class='helper-error'><ul></ul></span>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s6 categorie_id">
                  
          {!! Form::select('categorie_id', $categories, null, ['id'=>'categorie_id', 'data-validate'=>'required integer']) !!}

          <label>Categorie</label>
          <span class='helper-error'><ul></ul></span>
        </div>

       <!-- <div class="input-field col s6 state_id">
          
          {!! Form::select('state_id', ['L' => 'Large', 'S' => 'Small'], null, ['id'=>'state_id', 'data-validate'=>'required integer']) !!}
          <label>State</label>
          <span class='helper-error'><ul></ul></span>
        </div> -->

      </div>