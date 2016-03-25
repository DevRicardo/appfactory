<div class="row" style="padding: 10px;">


       <div class='row'>
                    <div class='input-field col s12 m12 l12crop_id'> 
          
                       {!! Form::select('crop_id', $crops, null, ['id'=>'crop_id', 'data-validate'=>'']) !!} 
                        <label for='description'>Cultivos</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div> 

    <div class='row'>
                    <div class='input-field col s12 m12 l12name'> 
          
                        {!! Form::text('name',null, ['id'=>'name', 'data-validate'=>'']) !!} 
                        <label for='description'>Parametro</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div>

                <div class='row'>
                    <div class='input-field col s12 m12 l12minimo'> 
          
                        {!! Form::text('minimo',null, ['id'=>'minimo', 'data-validate'=>'']) !!} 
                        <label for='description'>Minimo</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div><div class='row'>
                    <div class='input-field col s12 m12 l12maximo'> 
          
                        {!! Form::text('maximo',null, ['id'=>'maximo', 'data-validate'=>'']) !!} 
                        <label for='description'>Maximo</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div><div class='row'>
                    <div class='input-field col s12 m12 l12unidad'> 
          
                       {!! Form::select('unidad', [''=>'Ninguna','mg/l'=>'mg/l','cm'=>'cm','°C'=>'°C'], null, ['id'=>'unidad', 'data-validate'=>'']) !!} 
                        <label for='description'>Unidad</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div><div class='row'>
                    <div class='input-field col s12 m12 l12consecuencia'> 
          
                        {!! Form::textarea('consecuencia',null, ['id'=>'consecuencia', 'data-validate'=>'', 'class'=>'materialize-textarea']) !!} 
                        <label for='description'>Consecuencia</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div><div class='row'>
                    <div class='input-field col s12 m12 l12recomendacion'> 
          
                        {!! Form::textarea('recomendacion',null, ['id'=>'recomendacion', 'data-validate'=>'', 'class'=>'materialize-textarea']) !!} 
                        <label for='description'>Recomendacion</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div>
                

</div>
