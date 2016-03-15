<?php namespace Modules\Generator\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Generator\Entities\Field;
use Illuminate\Http\Request;
use App\Tools\Messages;
use App\Tools\Files;
use Response;
use DB;

class FieldController extends Controller {
	
	public function index($table, $projects_name, $projects)	{

        $view = view('generator::index_field');
        $view->with([
        	'table'=>$table,
        	'projects'=>$projects, 
        	'projects_name'=>$projects_name
        ]);

        return $view;
		
	}


        public function store(Request $request)
        {
            dd($request->all()); 
            foreach ($request->all() as $key => $value) {
                         # code...
            }     

        }



	
	
}