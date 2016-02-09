<?php namespace Modules\Generator\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class GeneratorController extends Controller {
	
	public function index()
	{
		return view('generator::index');
	}
	
}