   <div class="row">

    <table class='bordered striped'>
        <thead><tr><th data-field='id'>#</th><th data-field=''name''>Name</th><th data-field=''description''>Description</th><th data-field=''peso_inicial''>Peso_inicial</th><th data-field=''peso_final''>Peso_final</th><th data-field=''></th></tr></thead><tbody>
        <?php $count = 1;?>
        @foreach ($phases as $key => $phase)<tr>
           <td>{!! $count !!}</td>   
        <td data-field=''name''>{!! $phase->name !!}</th><td data-field=''description''>{!! $phase->description !!}</th><td data-field=''peso_inicial''>{!! $phase->peso_inicial !!}</th><td data-field=''peso_final''>{!! $phase->peso_final !!}</th>
        <td>

            <!-- Dropdown Trigger -->
              <a class='dropdown-button  right' href='#' data-beloworigin='true' data-activates='dropdown{!! $count !!}'>    
                  <i class='material-icons text-black tyni '>more_vert</i>
                 
              </a>

              <!-- Dropdown Structure -->
              <ul  id='dropdown{!! $count !!}' class='dropdown-content right'>
                <li>
                  <a data-action='edit' data-model='phases' href='#' onclick='redirect(this,{!! $phase->id !!})'>
                    <i  class='material-icons tyni left'>create</i>  
                    Edit
                  </a>
                </li>

                <li>
                  <a href='#' data-action='show' data-model='phases' onclick='redirect(this,{!! $phase->id !!})'>
                    <i class='material-icons tyni left'>visibility</i> 
                    Show   
                  </a>
                </li>

                <li>
                  <a  data-action='delete' class='delete' data-id='{!! $phase->id !!}' data-model='phases' href='#' >
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
        {!! $phases->appends(['sort' => 'votes'])->links() !!}  
    </div>
    <script type="text/javascript">
      dropdown()
    </script>
