<div class="row" style="padding: 10px;">

    <div class='row'>
                    <div class='input-field col s12 m12 l12phase_id'> 
          
                       {!! Form::select('phase_id', [], null, ['id'=>'phase_id', 'data-validate'=>'']) !!} 
                        <label for='description'>Phase_id</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div><div class='row'>
                    <div class='input-field col s12 m12 l12siembra'> 
          
                       {!! Form::select('siembra', [], null, ['id'=>'siembra', 'data-validate'=>'']) !!} 
                        <label for='description'>Siembra</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div><div class='row'>
                    <div class='input-field col s12 m12 l12maximo'> 
          
                        {!! Form::number('maximo',null, ['id'=>'maximo', 'data-validate'=>'']) !!} 
                        <label for='description'>Maximo</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div><div class='row'>
                    <div class='input-field col s12 m12 l12minimo'> 
          
                        {!! Form::number('minimo',null, ['id'=>'minimo', 'data-validate'=>'']) !!} 
                        <label for='description'>Minimo</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div>  

</div>
