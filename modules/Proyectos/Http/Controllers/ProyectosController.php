<?php namespace Modules\Proyectos\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class ProyectosController extends Controller {
	
	public function index()
	{
		return view('proyectos::index');
	}
	
}