@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('content')


    <div class="row">

    @foreach ($projects as $key => $project)

        <div class="col s12 m12 l4">

            <div class="card hoverable" style="height:250px">
              <div class="card-image waves-effect waves-block waves-light blue lighten-3" style="height: 100px;">
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
                        <a class="waves-effect waves-light btn btn-small " style="width: 100%; margin-top:5px;">
                           <i class="small material-icons">extension</i> 
                           Construct
                      </a>  
                    </div>

                    <div class="col s12 m12 l12 " >
                        <a class="waves-effect waves-light btn btn-small " style="width: 100%; margin-top:5px;">
                           <i class="small material-icons">create</i> 
                           Edit
                      </a>  
                    </div>

                    <div class="col s12 m12 l12 " >
                        <a class="waves-effect waves-light btn btn-small " style="width: 100%; margin-top:5px;">
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
        {!! $projects->links() !!}  
    </div>


    <!-- <div class="row">
        <div class="col s12 m7 l12">

            <div class="card">
              <div class="card-image waves-effect waves-block waves-light purple lighten-3">
                 <br>
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Modulo gestión de usuarios<i class="material-icons right">more_vert</i></span>
                <p><a href="#">Ver detalles</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Modulo gestión de usuarios<i class="material-icons right">close</i></span>
                <p>Modulo encargado de crear, actualizar e inactivar usuarios. ademas de gestionar sus permisos.</p>
              </div>
            </div>          

        </div>
    </div> -->





@stop