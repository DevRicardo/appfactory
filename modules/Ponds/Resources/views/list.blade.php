   <div class="row">


    <table class='bordered striped'>
        <thead>
            <tr>
                <th data-field='id'>#</th>
                <th data-field=''crop_id''>Cultivo</th>
                <th data-field=''phase_id''>Fase</th>
                <th data-field=''siembra''>Siembra</th>
                <th data-field=''maximo''>Densidad minima(ind/m<sup>2</sup>)</th>
                <th data-field=''minimo''>Densidad maxima(ind/m<sup>2</sup>)</th>
                <th data-field=''></th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1;?>
        @foreach ($ponds as $key => $pond)<tr>
           <td>{!! $count !!}</td>  
           <td data-field=''phase_id''>{!! $pond->crops()->first()->name !!}</td>  
           <td data-field=''phase_id''>{!! $pond->phases()->first()->name !!}</td> 
           <td data-field=''siembra''>{!! $pond->siembra !!}</td>
           <td data-field=''maximo''>{!! $pond->minimo !!}</td>
           <td data-field=''minimo''>{!! $pond->maximo !!}</td>
        <td>

            <!-- Dropdown Trigger -->
              <a class='dropdown-button  right' href='#' data-beloworigin='true' data-activates='dropdown{!! $count !!}'>    
                  <i class='material-icons text-black tyni '>more_vert</i>
                 
              </a>

              <!-- Dropdown Structure -->
              <ul  id='dropdown{!! $count !!}' class='dropdown-content right'>
                <li>
                  <a data-action='edit' data-model='ponds' href='#' onclick='redirect(this,{!! $pond->id !!})'>
                    <i  class='material-icons tyni left'>create</i>  
                    Edit
                  </a>
                </li>

                <li>
                  <a href='#' data-action='show' data-model='ponds' onclick='redirect(this,{!! $pond->id !!})'>
                    <i class='material-icons tyni left'>visibility</i> 
                    Show   
                  </a>
                </li>

                <li>
                  <a  data-action='delete' class='delete' data-id='{!! $pond->id !!}' data-model='ponds' href='#' >
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
        {!! $ponds->appends(Request::all())->links() !!}  
    </div>
    <script type="text/javascript">
      dropdown()
    </script>