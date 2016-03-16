<?php namespace Modules\Generator\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Generator\Entities\Field;
use Illuminate\Http\Request;
use App\Tools\Messages;
use App\Tools\Files;
use Response;
use DB;

class FieldController extends Controller {
	
	public function index($idtable, $table, $projects_name, $projects)	{
   
        $fields = Field::where('table_id',$idtable)->get();
        $view = view('generator::index_field');
        $view->with([
            'fields'=> $fields,
            'idtable'=> $idtable,
        	'table'=>$table,
        	'projects'=>$projects, 
        	'projects_name'=>$projects_name
        ]);

        return $view;
		
	}


        public function store(Request $request)
        {

             
            try {

                DB::beginTransaction();

                DB::table('fields')->where('table_id', $request->idtable)->delete();          
                foreach ($request->all() as $key => $value) {
                if(is_array($value)){
                
                                 # code...
                    $field = [   
                            'name'           => $value[0],
                            'type'           => $value[1],
                            'length'         => $value[2],
                            'html_component' => $value[3],
                            'attributes'     => $value[4],
                            'validations'    => $value[5],
                            'table_id'       => $request->idtable
                    ];

                Field::create($field); 
                }
                DB::commit();
            }
                
            } catch (\Exception $e) {
                DB::rollBack(); 
                dd($e);
            }

                 

        }



	
	
}