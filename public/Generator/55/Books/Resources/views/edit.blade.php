@extends('layouts.home')

@section('search')
   @include('partials.button_search')
@endsection

@section('content')

<div class="col s12 m12 l12">
<br>
  <div class="chip teal lighten-4 z-depth-1 hoverable">
        <a href="{!! url('/books') !!}">
            Projects 
            <i class="material-icons">keyboard_arrow_right</i>
        </a>
        
  </div>
  <div class="chip teal lighten-4 z-depth-1">
       <a href="{!! url('/books/create') !!}">
           Edit 
       </a>
       
  </div>
  
</div>      
  


<div class="">
    <br>
    
  <div class="row">
    
    {!! Form::model($book, ['url'=>'books/'.$book->id, 'method'=>'PUT', 'class' => 'col s12 card-panel z-depth-1 grey lighten-3 update','name'=>'update_books','enctype'=>'multipart/form-data']) !!}
    
   
    @include('books::fields')
   

    <div class="input-field col s6" style="margin-bottom: 18px;">
        <input type="submit" class="btn waves-effect waves-light blue lighten-1" value="Update" />
    </div>
    <br>
    {!! Form::close() !!}
  </div>

</div>    

@stop

@section('scripts')

     @include('books::partial.script')
    
     <script type="text/javascript">
       
         $("#name").attr('readonly','readonly');   
    
     </script>

@stop

