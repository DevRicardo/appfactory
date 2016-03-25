   <div class="row">

    <table class='bordered striped'>
        <thead><tr><th data-field='id'>#</th><th data-field=''name''>Name</th><th data-field=''minimo''>Minimo</th><th data-field=''maximo''>Maximo</th><th data-field=''unidad''>Unidad</th><th data-field=''consecuencia''>Consecuencia</th><th data-field=''recomendacion''>Recomendacion</th><th data-field=''crop_id''>Crop_id</th><th data-field=''></th></tr></thead><tbody>
        <?php $count = 1;?>
        @foreach ($parameters as $key => $parameter)<tr>
           <td>{!! $count !!}</td>   
        <td data-field=''name''>{!! $parameter->name !!}</th><td data-field=''minimo''>{!! $parameter->minimo !!}</th><td data-field=''maximo''>{!! $parameter->maximo !!}</th><td data-field=''unidad''>{!! $parameter->unidad !!}</th><td data-field=''consecuencia''>{!! $parameter->consecuencia !!}</th><td data-field=''recomendacion''>{!! $parameter->recomendacion !!}</th><td data-field=''crop_id''>{!! $parameter->crop_id !!}</th>
        <td>

            <!-- Dropdown Trigger -->
              <a class='dropdown-button  right' href='#' data-beloworigin='true' data-activates='dropdown{!! $count !!}'>    
                  <i class='material-icons text-black tyni '>more_vert</i>
                 
              </a>

              <!-- Dropdown Structure -->
              <ul  id='dropdown{!! $count !!}' class='dropdown-content right'>
                <li>
                  <a data-action='edit' data-model='parameters' href='#' onclick='redirect(this,{!! $parameter->id !!})'>
                    <i  class='material-icons tyni left'>create</i>  
                    Edit
                  </a>
                </li>

                <li>
                  <a href='#' data-action='show' data-model='parameters' onclick='redirect(this,{!! $parameter->id !!})'>
                    <i class='material-icons tyni left'>visibility</i> 
                    Show   
                  </a>
                </li>

                <li>
                  <a  data-action='delete' class='delete' data-id='{!! $parameter->id !!}' data-model='parameters' href='#' >
                    <i class='material-icons tyni left delete'>delete</i>
                    Delete 
                  </a>
                </li>
              </ul>  
        </td>



        </tr>
        <?php $count++;?>
        @endforeach
        </tbody>
         
        </table> 

    </div>
    <div>
        {!! $parameters->appends(['sort' => 'votes'])->links() !!}  
    </div>
    <script type="text/javascript">
      dropdown()
    </script>
