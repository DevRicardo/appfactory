@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@stop

@section('menu_floating')
         <!-- Page Content goes here -->
       
         <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
      <i class="large mdi-navigation-menu"></i>
    </a>
    <ul>
       <li><a class="btn-floating green"><i class="material-icons">build</i></a></li>
      <li><a href="{!! url('/generator/create/'.$projects.'/'.$projects_name) !!}" class="btn-floating blue"><i class="material-icons">add</i></a></li>
    </ul>
  </div>
    
@stop
@section('content')

<div class="col s12 m12 l12">
<br>
  <div class="chip teal lighten-4 z-depth-1 hoverable">
        <a href="{!! url('/projects') !!}">
            Projects 
            <i class="material-icons">keyboard_arrow_right</i>
        </a>
        
  </div>
  <div class="chip teal lighten-4 z-depth-1">
       <a href="#">

           Tables for
           
           <strong>{!! $projects_name !!}</strong>

       </a>
       
  </div>
  
</div> 
<br>


    
    <div class="col s12 m12 l12 card-panel z-depth-1 grey lighten-3" >
    	 <table class="responsive-table">
        <thead>
          <tr>
              <th data-field="id">#</th>
              <th data-field="name">Name</th>
              <th data-field="fields">Fields</th>
              <th data-field="records">Records</th>
              <th data-field="actions"></th>
          </tr>
        </thead>

        <tbody>
        <?php $count = 1;?>
        @foreach ($tables as $key => $value) 
          <tr>
            <td>{!! $count !!}</td>
            <td>{!! $value->name !!}</td>
            <td></td>
            <td></td>
            <td> 
              <!-- Dropdown Trigger -->
              <a class='dropdown-button btn' href='#' data-activates='dropdown0'>    
                  <i class="material-icons tyni left">dashboard</i> 
                  Actions 
              </a>

              <!-- Dropdown Structure -->
              <ul id='dropdown0' class='dropdown-content'>
                <li>
                  <a href="{!! url('/generator/'.$value->name.'/edit') !!}">
                    <i  class="material-icons tyni left">create</i>  
                    Edit
                  </a>
                </li>

                <li>
                  <a href="{!! url('/generator/fields/'.$value->name.'/'.$projects_name.'/'.$projects) !!}">
                    <i class="material-icons tyni left">add</i> 
                    Fields   
                  </a>
                </li>

                <li>
                  <a href="#!">
                    <i class="material-icons tyni left">web</i> 
                    Form   
                  </a>
                </li>
                <li>
                  <a href="{!! url('/generator/'.$value->name.'/delete') !!}">
                    <i class="material-icons tyni left">delete</i> 
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
   



@stop

@section('scripts')

     @include('generator::partial.script')

@stop