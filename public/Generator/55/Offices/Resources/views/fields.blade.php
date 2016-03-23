<div class="row" style="padding: 10px;">

    <div class='row'>
                    <div class='input-field col s12 m12 l12departamento'> 
          
                        {!! Form::text('departamento',null, ['id'=>'departamento', 'data-validate'=>'required']) !!} 
                        <label for='description'>Departamento</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div><div class='row'>
                    <div class='input-field col s12 m12 l12numero'> 
          
                        {!! Form::number('numero',null, ['id'=>'numero', 'data-validate'=>'required']) !!} 
                        <label for='description'>Numero</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div><div class='row'>
                    <div class='input-field col s12 m12 l12edificio'> 
          
                        {!! Form::textarea('edificio',null, ['id'=>'edificio', 'data-validate'=>'', 'class'=>'materialize-textarea']) !!} 
                        <label for='description'>Edificio</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div>  

</div>
