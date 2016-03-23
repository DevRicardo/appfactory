   <div class="row">

    <table class='bordered striped'>
        <thead><tr><th data-field='id'>#</th><th data-field=''departamento''>Departamento</th><th data-field=''numero''>Numero</th><th data-field=''edificio''>Edificio</th><th data-field=''></th></tr></thead><tbody>
        <?php $count = 1;?>
        @foreach ($offices as $key => $office)<tr>
           <td>{!! $count !!}</td>   
        <td data-field=''departamento''>{!! $office->departamento !!}</th><td data-field=''numero''>{!! $office->numero !!}</th><td data-field=''edificio''>{!! $office->edificio !!}</th>
        <td>

            <!-- Dropdown Trigger -->
              <a class='dropdown-button  right' href='#' data-beloworigin='true' data-activates='dropdown{!! $count !!}'>    
                  <i class='material-icons text-black tyni '>more_vert</i>
                 
              </a>

              <!-- Dropdown Structure -->
              <ul  id='dropdown{!! $count !!}' class='dropdown-content right'>
                <li>
                  <a data-action='edit' data-model='offices' href='#' onclick='redirect(this,{!! $office->id !!})'>
                    <i  class='material-icons tyni left'>create</i>  
                    Edit
                  </a>
                </li>

                <li>
                  <a href='#' data-action='show' data-model='offices' onclick='redirect(this,{!! $office->id !!})'>
                    <i class='material-icons tyni left'>visibility</i> 
                    Show   
                  </a>
                </li>

                <li>
                  <a  data-action='delete' class='delete' data-id='{!! $office->id !!}' data-model='offices' href='#' >
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
        {!! $offices->appends(['sort' => 'votes'])->links() !!}  
    </div>
    <script type="text/javascript">
      dropdown()
    </script>
