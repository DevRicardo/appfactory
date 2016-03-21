<div class="row" style="padding: 10px;">

    <div class='row'>
                    <div class='input-field col s12 m12 l12titulo'> 
          
                        {!! Form::text('titulo',null, ['id'=>'titulo', 'data-validate'=>'required|max:']) !!} 
                        <label for='description'>Titulo</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div><div class='row'>
                    <div class='input-field col s12 m12 l12etert'> 
          
                        {!! Form::email('etert',null, ['id'=>'etert', 'data-validate'=>'required']) !!} 
                        <label for='description'>Etert</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div>  

</div>
