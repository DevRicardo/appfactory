<div class="row" style="padding: 10px;">

    <div class='row'>
                    <div class='input-field col s12 m12 l12 phase_id'> 
          
                       {!! Form::select('phase_id', $phases, null, ['id'=>'phase_id', 'data-validate'=>'']) !!} 
                        <label for='description'>Fase</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div><div class='row'>
                    <div class='input-field col s12 m12 l12 siembra'> 
          
                       {!! Form::select('siembra', ['Intensiva'=>'Intensiva', 'Super Intensiva'=>'Super Intensiva'], null, ['id'=>'siembra', 'data-validate'=>'']) !!} 
                        <label for='description'>Siembra</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div>
               
                <div class='row'>
                    <div class='input-field col s12 m12 l12 minimo'> 
          
                        {!! Form::number('minimo',null, ['id'=>'minimo', 'data-validate'=>'']) !!} 
                        <label for='description'>Minimo</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div> 

                 <div class='row'>
                    <div class='input-field col s12 m12 l12 maximo'> 
          
                        {!! Form::number('maximo',null, ['id'=>'maximo', 'data-validate'=>'']) !!} 
                        <label for='description'>Maximo</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div> 

</div>
