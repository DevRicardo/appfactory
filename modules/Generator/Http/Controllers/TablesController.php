<?php namespace Modules\Generator\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class TablesController extends Controller {
	
	public function index($projects)
	{
		$view = view('generator::index');
		$view->with('projects', $projects);

		return $view;
	}



	
	
}