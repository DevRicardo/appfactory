@extends('layouts.app')

@section('content')

<div class="row">

<div class="col s12 m8 l6 card-panel offset-l3 offset-m2" style="margin-top:100px;">
         <div class="row">
        <form class="col s12" role="form" method="POST" action="{{ url('autentication/login') }}">
          {!! csrf_field() !!}
                    
          
          <div class="row">
            <div class="input-field col s12">
              <input id="email" name="email" type="email" value="jarl1109@gmail.com" class="validate" value="{{ old('email') }}" autocomplete="off" >
              <label for="email">Email</label>
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
          </div>
         
          <div class="row">
            <div class="input-field col s12">
              <input id="password" name="password" type="password" value="monteria1109" class="validate">
              <label for="password">Clave</label>
              @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="row">
            <div class="col s12">
                  
                <input type="checkbox" name="remember" id="remember"> 
                <label for="remember">Recordar</label>
                         
            </div>
          </div>

           <button type="submit" class="btn btn-primary ">
               <i class="fa fa-btn fa-sign-in"></i>Ingresa
           </button>

           <!-- <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>-->
        </form>
      </div>
</div>



@endsection
