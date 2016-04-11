<div class="row" style="padding: 10px;">

    <div class='row'>
                    <div class='input-field col s12 m12 l12name'> 
          
                        {!! Form::text('name',null, ['id'=>'name', 'data-validate'=>'']) !!} 
                        <label for='description'>Name</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div><div class='row'>
                    <div class='input-field col s12 m12 l12description'> 
          
                        {!! Form::textarea('description',null, ['id'=>'description', 'data-validate'=>'', 'class'=>'materialize-textarea']) !!} 
                        <label for='description'>Description</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div>  

</div>
