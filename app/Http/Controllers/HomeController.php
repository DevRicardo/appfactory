<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        
        /*$salida = shell_exec('php ../artisan module:make Automatico');
        $salida .= shell_exec("chmod 777 -R ../modules/Automatico/");
        return  "<pre>$salida</pre>";*/
        return view("home");
        
    }
}
