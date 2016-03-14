   <div class="row">

    @foreach ($projects as $key => $project)

        <div class="col s12 m12 l4">

            <div class="card hoverable" style="height:250px" id="_{!! $project->id !!}">
              <div class="card-image waves-effect waves-block waves-light" style="height: 100px;">
                 <img class="activator" src="{!! url('storage/'.$project->image) !!}">
              </div>
              <div class="card-title grey-text text-darken-4 center-align flow-text activator" >{!! $project->name !!}</div>
              <div class="card-content truncate">
                
                {!! $project->description !!}
                                
              </div>

              <div class="card-reveal">

                <span class="card-title grey-text text-darken-4 ">
                    <i class="material-icons right">close</i>                    
                </span>
                <h5 class="" style="text-align: center; margin-top: 25px;">Option</h5>
                
                <div class="row">
                    <div class="col s12 m12 l12 " >
                        <a href="{!! url('/generator/'.$project->id) !!}" class="waves-effect waves-light btn btn-small " style="width: 100%; margin-top:5px;">
                           <i class="small material-icons">extension</i> 
                           Construct
                      </a>  
                    </div>

                    <div class="col s12 m12 l12 " >
                        <a href="{!! url('/projects/'.$project->id.'/edit') !!}" class="waves-effect waves-light btn btn-small " style="width: 100%; margin-top:5px;">
                           <i class="small material-icons">create</i> 
                           Edit
                      </a>  
                    </div>

                    <div class="col s12 m12 l12 " >
                        <a class="waves-effect waves-light btn btn-small delete" data-id="{!! $project->id !!}" style="width: 100%; margin-top:5px;">
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
        {!! $projects->appends(['sort' => 'votes'])->links() !!}  
    </div>