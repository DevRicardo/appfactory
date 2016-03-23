<?php

namespace Modules\Autentication\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIsNotGuest
{
    /**
     * Encargado de determinar si un usuario no es invitado
     * en este caso no lo dejara entrar al formulario de login
     * y lo redireccionara al home de la aplicación
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if(!Auth::guard($guard)->guest()){

            return redirect()->to("home");

        }

        return $next($request);
    }
}
