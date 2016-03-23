<?php namespace Modules\Generator\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Generator\Entities\Field;
use Modules\Generator\Entities\Table;
use Illuminate\Http\Request;
use App\Traits\TraitPluralizeText;
use App\Tools\Messages;
use App\Tools\Files;
use Response;
use DB;

class GeneratorController extends Controller {
	
	private $base_dir;
	private $constant;
    use TraitPluralizeText;

	public function __construct()
	{
		$this->base_dir = "Generator/";
		$this->constant = [];
	}
    

    public function createdir(Request $request)
    {
        $dir_module = $this->base_dir."".$request->id;
        if(is_dir($dir_module)){
    	    
    	    return json_encode(["result"=>"<p>Directorio del modulo <i class='green-text small material-icons'>done</i></p>"]);

	    }else{
            mkdir($dir_module);
    	    if(is_dir($dir_module)){

    		return json_encode(["result"=>"<p>Directorio del modulo <i class='green-text  small material-icons'>done</i></p>"]);

    	    }  
	    }

	    return json_encode(["result"=>"<p>Directorio del modulo <i class='red-text  small material-icons'>report_problem</i></p>"]);


    }


    public function copybasemodule(Request $request)
    {
    	$dir_module = $this->base_dir."".$request->id;
        //$this->rmdir_recursive($dir_module);
    	
    	$origin = $this->base_dir."module_base/Module";
        
        $this->constant = $this->generateConstant($request);

    	if($this->copyr($origin, $dir_module."/".ucwords($request->name)."/")){

            return json_encode(["result"=>"<p>Modulo base copiado y renombrado <i class='green-text small material-icons'>done</i></p>"]);
  
    	}else{
    	    return json_encode(["result"=>"<p>Modulo base copiado y renombrado <i class='red-text  small material-icons'>report_problem</i></p>"]);
	
    	}
    }


    public function createrepository(Request $request)
    {
    	$dir_module = $this->base_dir."".$request->id;
    	$this->constant = $this->generateConstant($request);
    	

    	$repoactual = $dir_module."/".ucwords($request->name)."/Repositories/ProjectRepository.php";
    	$newRepo = $dir_module."/".ucwords($request->name)."/Repositories/".$this->constant['_model_']."Repository.php";
        
        // renombrando repositirio
    	rename($repoactual, $newRepo);
        
        // remplazando constantes
    	$path_to_file = $newRepo;
		$file_contents = file_get_contents($path_to_file);
		

		foreach ($this->constant as $key => $value) {
			# code...
			$file_contents = str_replace(''.$key.'',''.$value.'',$file_contents);
			//echo $key."<br>";
		}        

		file_put_contents($path_to_file,$file_contents);

    	if(is_file($newRepo))
    	{
    		return json_encode(["result"=>"<p>Creando repository <i class='green-text small material-icons'>done</i></p>"]);
    	}else
    	{
    		return json_encode(["result"=>"<p>Creando repository <i class='red-text  small material-icons'>report_problem</i></p>"]);
    	}
    	
    }


    public function createprovider(Request $request)
    {
    	# code...
    	$dir_module = $this->base_dir."".$request->id;
    	$this->constant = $this->generateConstant($request);

    	$proviactual = $dir_module."/".ucwords($request->name)."/Providers/ProjectsServiceProvider.php";
    	$newProvi = $dir_module."/".ucwords($request->name)."/Providers/".$this->constant['_model_plural_']."ServiceProvider.php";

    	

    	 // renombrando repositirio
    	rename($proviactual, $newProvi);

    	$path_to_file = $newProvi;
		$file_contents = file_get_contents($path_to_file);
		

		foreach ($this->constant as $key => $value) {
			# code...
			$file_contents = str_replace(''.$key.'',''.$value.'',$file_contents);
			//echo $key."<br>";
		}        

		file_put_contents($path_to_file,$file_contents);

    	if(is_file($newProvi))
    	{
    		return json_encode(["result"=>"<p>Crenado providers<i class='green-text small material-icons'>done</i></p>"]);
    	}else
    	{
    		return json_encode(["result"=>"<p>Creando providers <i class='red-text  small material-icons'>report_problem</i></p>"]);
    	}
    }



    public function createrequest(Request $request)
    {
    	$dir_module = $this->base_dir."".$request->id;
    	$this->constant = $this->generateConstant($request);
        $this->constant['_rules_'] = $this->getRules( $request->id,$request->name);

    	$createRecuestActual = $dir_module."/".ucwords($request->name)."/Http/Requests/CreateProjectsRequest.php";
    	$newRecuestCreate = $dir_module."/".ucwords($request->name)."/Http/Requests/Create".$this->constant['_model_plural_']."Request.php";

    	$updateRecuestActual = $dir_module."/".ucwords($request->name)."/Http/Requests/UpdateProjectsRequest.php";
    	$newRecuestUpdate = $dir_module."/".ucwords($request->name)."/Http/Requests/Update".$this->constant['_model_plural_']."Request.php";
        //dd($createRecuestActual); 
         // renombrando request create
        rename($createRecuestActual, $newRecuestCreate); 
         // renombrando request update
        rename($updateRecuestActual, $newRecuestUpdate); 



        $path_to_file_create = $newRecuestCreate;
        $path_to_file_update = $newRecuestUpdate;

        $file_contents_create = file_get_contents($path_to_file_create);
        $file_contents_update = file_get_contents($path_to_file_update);
        

        foreach ($this->constant as $key => $value) {
            # code...
            $file_contents_create = str_replace(''.$key.'',''.$value.'',$file_contents_create);
            $file_contents_update = str_replace(''.$key.'',''.$value.'',$file_contents_update);
            //echo $key."<br>";
        }        

        file_put_contents($path_to_file_create,$file_contents_create);
        file_put_contents($path_to_file_update,$file_contents_update);

        if(is_file($newRecuestCreate) && is_file($newRecuestUpdate))
        {
            return json_encode(["result"=>"<p>Crenado Request<i class='green-text small material-icons'>done</i></p>"]);
        }else
        {
            return json_encode(["result"=>"<p>Creando Requesat <i class='red-text  small material-icons'>report_problem</i></p>"]);
        }

    }


    public function createroutes(Request $request)
    {
        $dir_module = $this->base_dir."".$request->id;
        $this->constant = $this->generateConstant($request);

        $routeActual = $dir_module."/".ucwords($request->name)."/Http/routes.php";

        $path_to_file = $routeActual;
        $file_contents = file_get_contents($path_to_file);
        

        foreach ($this->constant as $key => $value) {
            # code...
            $file_contents = str_replace(''.$key.'',''.$value.'',$file_contents);
            //echo $key."<br>";
        }        

        file_put_contents($path_to_file,$file_contents);

        if(is_file($routeActual))
        {
            return json_encode(["result"=>"<p>Crenado rutas<i class='green-text small material-icons'>done</i></p>"]);
        }else
        {
            return json_encode(["result"=>"<p>Creando rutas <i class='red-text  small material-icons'>report_problem</i></p>"]);
        }
        


    }


    public function createcontoller(Request $request)
    {
        $dir_module = $this->base_dir."".$request->id;
        $this->constant = $this->generateConstant($request);

        $controlleractual = $dir_module."/".ucwords($request->name)."/Http/Controllers/ProjectsController.php";
        $newcontroller = $dir_module."/".ucwords($request->name)."/Http/Controllers/".$this->constant['_model_plural_']."Controller.php";

        

         // renombrando repositirio
        rename($controlleractual, $newcontroller);

        $path_to_file = $newcontroller;
        $file_contents = file_get_contents($path_to_file);
        

        foreach ($this->constant as $key => $value) {
            # code...
            $file_contents = str_replace(''.$key.'',''.$value.'',$file_contents);
            //echo $key."<br>";
        }        

        file_put_contents($path_to_file,$file_contents);

        if(is_file($newcontroller))
        {
            return json_encode(["result"=>"<p>Crenado Controladores<i class='green-text small material-icons'>done</i></p>"]);
        }else
        {
            return json_encode(["result"=>"<p>Creando Controladores <i class='red-text  small material-icons'>report_problem</i></p>"]);
        }
    } 



    public function createmodel(Request $request)
    {

        $dir_module = $this->base_dir."".$request->id;
        $this->constant = $this->generateConstant($request);

        $modelactual = $dir_module."/".ucwords($request->name)."/Entities/Project.php";
        $newmodel = $dir_module."/".ucwords($request->name)."/Entities/".$this->constant['_model_'].".php";

        

         // renombrando repositirio
        rename($modelactual, $newmodel);

        $path_to_file = $newmodel;
        $file_contents = file_get_contents($path_to_file);
        

        foreach ($this->constant as $key => $value) {
            # code...
            $file_contents = str_replace(''.$key.'',''.$value.'',$file_contents);
            //echo $key."<br>";
        }        

        file_put_contents($path_to_file,$file_contents);

        if(is_file($newmodel))
        {
            return json_encode(["result"=>"<p>Crenado Modelos<i class='green-text small material-icons'>done</i></p>"]);
        }else
        {
            return json_encode(["result"=>"<p>Creando Modelos <i class='red-text  small material-icons'>report_problem</i></p>"]);
        }

    }



    public function createconfig(Request $request)
    {

        $dir_module = $this->base_dir."".$request->id;
        $this->constant = $this->generateConstant($request);

        $configActual = $dir_module."/".ucwords($request->name)."/Config/config.php";
       
        $composerActual = $dir_module."/".ucwords($request->name)."/composer.json";
        $moduleActual = $dir_module."/".ucwords($request->name)."/module.json";
        



        $path_to_file_config = $configActual;
        $path_to_file_composer = $composerActual;
        $path_to_file_module = $moduleActual;

        $file_contents_config = file_get_contents($path_to_file_config);
        $file_contents_composer = file_get_contents($path_to_file_composer);
        $file_contents_module = file_get_contents($path_to_file_module);
        

        foreach ($this->constant as $key => $value) {
            # code...
            $file_contents_config = str_replace(''.$key.'',''.$value.'',$file_contents_config);
            $file_contents_composer = str_replace(''.$key.'',''.$value.'',$file_contents_composer);
            $file_contents_module = str_replace(''.$key.'',''.$value.'',$file_contents_module);

            //echo $key."<br>";
        }        

        file_put_contents($path_to_file_config,$file_contents_config);
        file_put_contents($path_to_file_composer,$file_contents_composer);
        file_put_contents($path_to_file_module,$file_contents_module);

        if(is_file($configActual) && is_file($composerActual) && is_file($moduleActual))
        {
            return json_encode(["result"=>"<p>Crenado config.php , module.json y composer.json <i class='green-text small material-icons'>done</i></p>"]);
        }else
        {
            return json_encode(["result"=>"<p>Creando config.php , module.json y composer.json <i class='red-text  small material-icons'>report_problem</i></p>"]);
        }

    }



    public function createjs(Request $request)
    {

        $dir_module = $this->base_dir."".$request->id;
        $this->constant = $this->generateConstant($request);

        $deleteActual = $dir_module."/".ucwords($request->name)."/Assets/delete.js";
        

        $editActual = $dir_module."/".ucwords($request->name)."/Assets/projects.js";
        $newedit = $dir_module."/".ucwords($request->name)."/Assets/".$this->constant['_table_'].".js";
        //dd($createRecuestActual); 
         // renombrando request create
        rename($editActual, $newedit); 
       



        $path_to_file_delete = $deleteActual;
        $path_to_file_edit = $newedit;

        $file_contents_delete = file_get_contents($path_to_file_delete);
        $file_contents_edit = file_get_contents($path_to_file_edit);
        

        foreach ($this->constant as $key => $value) {
            # code...
            $file_contents_delete = str_replace(''.$key.'',''.$value.'',$file_contents_delete);
            $file_contents_edit = str_replace(''.$key.'',''.$value.'',$file_contents_edit);
            //echo $key."<br>";
        }        

        file_put_contents($path_to_file_delete,$file_contents_delete);
        file_put_contents($path_to_file_edit,$file_contents_edit);

        if(is_file($deleteActual) && is_file($newedit))
        {
            return json_encode(["result"=>"<p>Crenado archivos js<i class='green-text small material-icons'>done</i></p>"]);
        }else
        {
            return json_encode(["result"=>"<p>Creando archivos js <i class='red-text  small material-icons'>report_problem</i></p>"]);
        }

    }


    public function createview(Request $request){


        $dir_module = $this->base_dir."".$request->id;
        $this->constant = $this->generateConstant($request);
         
        $this->constant['_fields_'] =  $this->getFieldDbAll($request->id, $request->name);
        $this->constant['_list_'] = $this->getTable($request->name, $this->getFieldDb($request->id, $request->name));

        
       

        $indexActual = $dir_module."/".ucwords($request->name)."/Resources/views/index.blade.php";
        $createActual = $dir_module."/".ucwords($request->name)."/Resources/views/create.blade.php";
        $editActual = $dir_module."/".ucwords($request->name)."/Resources/views/edit.blade.php";
        $showActual = $dir_module."/".ucwords($request->name)."/Resources/views/show.blade.php";
        $fieldsActual = $dir_module."/".ucwords($request->name)."/Resources/views/fields.blade.php";
        $scriptActual = $dir_module."/".ucwords($request->name)."/Resources/views/partial/script.blade.php";
        $listActual = $dir_module."/".ucwords($request->name)."/Resources/views/list.blade.php";
  



        $path_to_file_index = $indexActual;
        $path_to_file_create = $createActual;
        $path_to_file_edit = $editActual;
        $path_to_file_script = $scriptActual;
        $path_to_file_field = $fieldsActual;
        $path_to_file_list = $listActual;
        $path_to_file_show = $showActual;

        $file_contents_index = file_get_contents($path_to_file_index);
        $file_contents_create = file_get_contents($path_to_file_create);
        $file_contents_edit = file_get_contents($path_to_file_edit);
        $file_contents_field = file_get_contents($path_to_file_field);
        $file_contents_script = file_get_contents($path_to_file_script);
        $file_contents_list = file_get_contents($path_to_file_list);
        $file_contents_show = file_get_contents($path_to_file_show);
        

        foreach ($this->constant as $key => $value) {
            # code...
            $file_contents_index = str_replace(''.$key.'',''.$value.'',$file_contents_index);
            $file_contents_create = str_replace(''.$key.'',''.$value.'',$file_contents_create);
            $file_contents_edit = str_replace(''.$key.'',''.$value.'',$file_contents_edit);
            $file_contents_field = str_replace(''.$key.'',''.$value.'',$file_contents_field);
            $file_contents_script = str_replace(''.$key.'',''.$value.'',$file_contents_script);
            $file_contents_list = str_replace(''.$key.'',''.$value.'',$file_contents_list);
            $file_contents_show = str_replace(''.$key.'',''.$value.'',$file_contents_show);
            //echo $key."<br>";
        }        

        file_put_contents($path_to_file_index,$file_contents_index);
        file_put_contents($path_to_file_create,$file_contents_create);
        file_put_contents($path_to_file_edit,$file_contents_edit);
        file_put_contents($path_to_file_field,$file_contents_field);
        file_put_contents($path_to_file_script,$file_contents_script);
        file_put_contents($path_to_file_list,$file_contents_list);
        file_put_contents($path_to_file_show,$file_contents_show);

        if(is_file($indexActual) && is_file($createActual) && is_file($editActual) && is_file($scriptActual))
        {
            return json_encode(["result"=>"<p>Crenado views js<i class='green-text small material-icons'>done</i></p>"]);
        }else
        {
            return json_encode(["result"=>"<p>Creando views js <i class='red-text  small material-icons'>report_problem</i></p>"]);
        }


    }


    public function createmigrate(Request $request)
    {
        $dir_module = $this->base_dir."".$request->id;
        $this->constant = $this->generateConstant($request);
        $this->constant['_migrate_'] = $this->getFieldMigrate($request->id, $request->name);

        $migratelactual = $dir_module."/".ucwords($request->name)."/Database/Migrations/2016_02_02_133951_create_projects_table.php";
        $newmigrate = $dir_module."/".ucwords($request->name)."/Database/Migrations/".date("Y")."_".date("m")."_".date("d")."_".rand(10000,99999)."_create_".$this->constant['_table_']."_table.php";

        

         // renombrando repositirio
        rename($migratelactual, $newmigrate);

        $path_to_file = $newmigrate;
        $file_contents = file_get_contents($path_to_file);
        

        foreach ($this->constant as $key => $value) {
            # code...
            $file_contents = str_replace(''.$key.'',''.$value.'',$file_contents);
            //echo $key."<br>";
        }        

        file_put_contents($path_to_file,$file_contents);

        if(is_file($newmigrate))
        {
            return json_encode(["result"=>"<p>Crenado Migraciones<i class='green-text small material-icons'>done</i></p>"]);
        }else
        {
            return json_encode(["result"=>"<p>Creando Migraciones <i class='red-text  small material-icons'>report_problem</i></p>"]);
        }
    }






/**************************************************************
*                                                             *
*                 ----------------------------                *
*                                                             *
**************************************************************/




    

	public function copyr($source, $dest) 
	{ 

	          // Simple copy for a file 
	    if (is_file($source)) { 
	        return copy($source, $dest); 
	    } 
	  
	    // Make destination directory
	    if (!is_dir($dest)) { 
	        mkdir($dest); 
	    } 
	  
	    // Loop through the folder 
	    $dir = dir($source); 
	    while (false !== $entry = $dir->read()) { 
	        // Skip pointers 
	        if ($entry == '.' || $entry == '..') { 
	            continue; 
	        } 
	  
	        // Deep copy directories 
	        if ($dest !== "$source/$entry") { 
	            $this->copyr("$source/$entry", "$dest/$entry"); 
	        } 
	    } 
	  
	    // Clean up 
	    $dir->close(); 
	    return true; 

	} 
	

	function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) $this->rmdir_recursive("$dir/$file");
        else unlink("$dir/$file");
    }
    rmdir($dir);
    }
    

    public function getFieldDb($project, $table){

        $array = "";
        //$field = Field::where('table_id',$idtable)->select("");
        $field = DB::table('projects')
        ->join('tables','projects.id','=','tables.project_id')
        ->join('fields','tables.id','=','fields.table_id')
        ->select('fields.name')
        ->where('tables.name','=',$table);  
        
        foreach ($field->get() as $value) {
            # code
            $array .= "'".$value->name."',";
        }
        return $array;

    }



        public function getFieldMigrate($project, $table){

        $array = "";
        //$field = Field::where('table_id',$idtable)->select("");
        $field = DB::table('projects')
        ->join('tables','projects.id','=','tables.project_id')
        ->join('fields','tables.id','=','fields.table_id')
        ->select('*')
        ->where('tables.name','=',$table);  
        
        foreach ($field->get() as $value) {
            # code
            if($value->type == "integer"){
               $array .= "\$table->".$value->type."('".$value->name."');"."\n";
            }else{
               $array .= "\$table->".$value->type."('".$value->name."','".$value->length."');"."\n";
            }
            
        }
        return $array;

    }


    public function getRules($project, $table)
    {
         $array = "";
        //$field = Field::where('table_id',$idtable)->select("");
        $field = DB::table('projects')
        ->join('tables','projects.id','=','tables.project_id')
        ->join('fields','tables.id','=','fields.table_id')
        ->select('*')
        ->where('tables.name','=',$table);  
        
        foreach ($field->get() as $value) {
            # code
            $array .= "'".$value->name."'=>'".$value->validations."',";
            
        }
        return $array;
    }


    public function getFieldDbAll($project, $table){

        $array = "";
        //$field = Field::where('table_id',$idtable)->select("");
        $field = DB::table('projects')
        ->join('tables','projects.id','=','tables.project_id')
        ->join('fields','tables.id','=','fields.table_id')
        ->select('*')
        ->where('tables.name','=',$table);  
        
        foreach ($field->get() as $value) {
            # code
            $array_type = explode(":", $value->html_component);
            
            $count = count($array_type);

            $campo = $array_type[0]; 
            if($count > 1){
               $type = $array_type[1];
            }
            

            if($campo == "input"){

                $array .= $this->getinput($value->name, $type,$value->attributes, $value->validations);

            }

            if($campo == "select"){

                $array .= $this->getSelect($value->name,$value->attributes, $value->validations);

            }

            if($campo == "textarea"){

                $array .= $this->getTextArea($value->name, $type,$value->attributes, $value->validations);

            }
        }
        return $array;

    }


    public function generateConstant(Request $request)
    {
        
       return ['_table_' => $request->name,
	   '_model_plural_' => $this->pluralize(ucwords($request->name)),
	   '_object_plural_' => $request->name,
	   '_model_' => ucwords($this->singularize($request->name)),
	   '_object_' => $this->singularize($request->name),
       '_fields_db_'=>$this->getFieldDb($request->id, $request->name)
	   ];
    }

     
    public function getinput($name, $type, $attibutes, $validations)
    {
        
        return "<div class='row'>
                    <div class='input-field col s12 m12 l12".$name."'> 
          
                        {!! Form::".$type."('".$name."',null, ['id'=>'".$name."', 'data-validate'=>'".$validations."']) !!} 
                        <label for='description'>".ucwords($name)."</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div>";

    }	

    public function getSelect($name, $attibutes, $validations)
    {
        return "<div class='row'>
                    <div class='input-field col s12 m12 l12".$name."'> 
          
                       {!! Form::select('".$name."', [], null, ['id'=>'".$name."', 'data-validate'=>'".$validations."']) !!} 
                        <label for='description'>".ucwords($name)."</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div>";
    }


    public function getTextArea($name, $attibutes, $validations)
    {
        return "<div class='row'>
                    <div class='input-field col s12 m12 l12".$name."'> 
          
                        {!! Form::textarea('".$name."',null, ['id'=>'".$name."', 'data-validate'=>'".$validations."', 'class'=>'materialize-textarea']) !!} 
                        <label for='description'>".ucwords($name)."</label>
                        <span class='helper-error'><ul></ul></span>
                    </div>
                </div>";
    }

    public function getTable($table, $colunms)
    {
        $colunms = explode(",",$colunms);

        $header = "<table class='bordered striped'>
        <thead><tr><th data-field='id'>#</th>";
        foreach ($colunms as $value) {
            # code...
            $header .= "<th data-field='".$value."'>".ucwords(str_replace("'","",$value))."</th>";
        }         
        $header .= "</tr></thead>";



        $body = "<tbody>
        <?php \$count = 1;?>
        @foreach (\$".$table." as \$key => \$".$this->singularize($table).")";
        $body .="<tr>
           <td>{!! \$count !!}</td>   
        "; 
        foreach ($colunms as $value) {
            if(!empty($value)){
            $body .= "<td data-field='".$value."'>{!! \$".$this->singularize($table)."->".str_replace("'","",$value)." !!}</th>";
            }
        }
        $body .="
        <td>

            <!-- Dropdown Trigger -->
              <a class='dropdown-button  right' href='#' data-beloworigin='true' data-activates='dropdown{!! \$count !!}'>    
                  <i class='material-icons text-black tyni '>more_vert</i>
                 
              </a>

              <!-- Dropdown Structure -->
              <ul  id='dropdown{!! \$count !!}' class='dropdown-content right'>
                <li>
                  <a data-action='edit' data-model='".$table."' href='#' onclick='redirect(this,{!! \$".$this->singularize($table)."->id !!})'>
                    <i  class='material-icons tyni left'>create</i>  
                    Edit
                  </a>
                </li>

                <li>
                  <a href='#' data-action='show' data-model='".$table."' onclick='redirect(this,{!! \$".$this->singularize($table)."->id !!})'>
                    <i class='material-icons tyni left'>visibility</i> 
                    Show   
                  </a>
                </li>

                <li>
                  <a  data-action='delete' class='delete' data-id='{!! \$".$this->singularize($table)."->id !!}' data-model='".$table."' href='#' >
                    <i class='material-icons tyni left delete'>delete</i>
                    Delete 
                  </a>
                </li>
              </ul>  
        </td>



        </tr>"; 


        
        
        $body .= "
        <?php \$count++;?>
        @endforeach
        </tbody>";


        $end = "
         
        </table> ";

        return $header.$body.$end;
    }
}

/*
,
	   '$_rules_$' => '',
	   
	   '$_fields_db_migrate_$'=>''
*/