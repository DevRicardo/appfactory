<?php namespace Modules\Generator\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Generator\Entities\Table;
use Illuminate\Http\Request;
use App\Tools\Messages;
use App\Tools\Files;
use Response;
use DB;

class TableController extends Controller {
	
	public function index($projects, $name)
	{
		$tables = Table::all();		
		$view = view('generator::index');
		$view->with([
			'projects'=>$projects,
			'projects_name'=> $name,
			'tables' => $tables
		]);


		return $view;
	}


	public function create($projects, $name)
	{
		$view = view('generator::create');
		$view->with([
			'projects'=>$projects,
			'projects_name'=> $name
		]);
		
		return $view;

	}


	public function store(Request $request)
	{
        Table::create($request->all());

        return redirect()->back();
	}



	
	
}