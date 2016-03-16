   <div class="row">

    @foreach ($$_table_$ as $key => $$_object_$)

        <div class="col s12 m12 l4">

            <div class="card hoverable" style="height:250px" id="_{!! $$_object_$->id !!}">
              <div class="card-image waves-effect waves-block waves-light" style="height: 100px;">
                 <img class="activator" src="{!! url('storage/'.$$_object_$->image) !!}">
              </div>
              <div class="card-title grey-text text-darken-4 center-align flow-text activator" >{!! $$_object_$->name !!}</div>
              <div class="card-content truncate">
                
                {!! $$_object_$->description !!}
                                
              </div>

              <div class="card-reveal">

                <span class="card-title grey-text text-darken-4 ">
                    <i class="material-icons right">close</i>                    
                </span>
                <h5 class="" style="text-align: center; margin-top: 25px;">Option</h5>
                
                <div class="row">
                    <div class="col s12 m12 l12 " >
                        <a class="waves-effect waves-light btn btn-small " style="width: 100%; margin-top:5px;">
                           <i class="small material-icons">extension</i> 
                           Construct
                      </a>  
                    </div>

                    <div class="col s12 m12 l12 " >
                        <a href="{!! url('/$_table_$/'.$$_object_$->id.'/edit') !!}" class="waves-effect waves-light btn btn-small " style="width: 100%; margin-top:5px;">
                           <i class="small material-icons">create</i> 
                           Edit
                      </a>  
                    </div>

                    <div class="col s12 m12 l12 " >
                        <a class="waves-effect waves-light btn btn-small delete" data-id="{!! $$_object_$->id !!}" style="width: 100%; margin-top:5px;">
                          <i class="small material-icons">delete</i>
                          Delete
                      </a>  
                    </div>
                  

                </div> 
                      
                      
              </div>
            </div>          

        </div>

    @endforeach    

    </div>
    <div>
        {!! $$_table_$->appends(['sort' => 'votes'])->links() !!}  
    </div>