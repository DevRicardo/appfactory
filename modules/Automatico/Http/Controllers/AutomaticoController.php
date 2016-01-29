<?php namespace Modules\Automatico\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class AutomaticoController extends Controller {
	
	public function index()
	{
		return view('automatico::index');
	}
	
}