   <div class="row">

    <table class='responsive-table bordered striped hoverable'>
        <thead><tr><th data-field='id'>#</th><th data-field=''titulo''>Titulo</th><th data-field=''autor''>Autor</th><th data-field=''etert''>Etert</th><th data-field=''></th></tr></thead><tbody>
        <?php $count = 1;?>
        @foreach ($books as $key => $book)<tr>
           <td>{!! $count !!}</td>   
        <td data-field=''titulo''>{!! $book->titulo !!}</th><td data-field=''autor''>{!! $book->autor !!}</th><td data-field=''etert''>{!! $book->etert !!}</th>
        <td>

            <!-- Dropdown Trigger -->
              <a class='dropdown-button btn' href='#' data-activates='dropdown{!! $count !!}'>    
                  <i class='material-icons tyni left'>dashboard</i> 
                  Actions 
              </a>

              <!-- Dropdown Structure -->
              <ul id='dropdown{!! $count !!}' class='dropdown-content'>
                <li>
                  <a data-action='edit' href='#' onclick='redirect(this,{!! $book->id !!})'>
                    <i  class='material-icons tyni left'>create</i>  
                    Edit
                  </a>
                </li>

                <li>
                  <a href='#' data-action='show' onclick='redirect(this,{!! $book->id !!})'>
                    <i class='material-icons tyni left'>add</i> 
                    Show   
                  </a>
                </li>

                <li>
                  <a  data-action='delete' href='#' onclick='redirect(this,{!! $book->id !!})'>
                    <i class='material-icons tyni left'>delete</i> 
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
        {!! $books->appends(['sort' => 'votes'])->links() !!}  
    </div>
