<?php namespace Modules\Projects\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class ProjectsController extends Controller {
	
	public function index()
	{
		return view('projects::index');
	}
	
}