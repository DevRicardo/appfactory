   <div class="row">

    <table class='bordered striped'>
        <thead><tr><th data-field='id'>#</th><th data-field=''name''>Name</th><th data-field=''description''>Description</th><th data-field=''></th></tr></thead><tbody>
        <?php $count = 1;?>
        @foreach ($crops as $key => $crop)<tr>
           <td>{!! $count !!}</td>   
        <td data-field=''name''>{!! $crop->name !!}</th><td data-field=''description''>{!! $crop->description !!}</th>
        <td>

            <!-- Dropdown Trigger -->
              <a class='dropdown-button  right' href='#' data-beloworigin='true' data-activates='dropdown{!! $count !!}'>    
                  <i class='material-icons text-black tyni '>more_vert</i>
                 
              </a>

              <!-- Dropdown Structure -->
              <ul  id='dropdown{!! $count !!}' class='dropdown-content right'>
                <li>
                  <a data-action='edit' data-model='crops' href='#' onclick='redirect(this,{!! $crop->id !!})'>
                    <i  class='material-icons tyni left'>create</i>  
                    Edit
                  </a>
                </li>

                <li>
                  <a href='#' data-action='show' data-model='crops' onclick='redirect(this,{!! $crop->id !!})'>
                    <i class='material-icons tyni left'>visibility</i> 
                    Show   
                  </a>
                </li>

                <li>
                  <a  data-action='delete' class='delete' data-id='{!! $crop->id !!}' data-model='crops' href='#' >
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
        {!! $crops->appends(['sort' => 'votes'])->links() !!}  
    </div>
    <script type="text/javascript">
      dropdown()
    </script>
