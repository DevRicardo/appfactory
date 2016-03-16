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
        
        $this->constant = $this->generateConstant($request->name);

    	if($this->copyr($origin, $dir_module."/".ucwords($request->name)."/")){

            return json_encode(["result"=>"<p>Modulo base copiado y renombrado <i class='green-text small material-icons'>done</i></p>"]);
  
    	}else{
    	    return json_encode(["result"=>"<p>Modulo base copiado y renombrado <i class='red-text  small material-icons'>report_problem</i></p>"]);
	
    	}
    }


    public function createrepository(Request $request)
    {
    	$dir_module = $this->base_dir."".$request->id;
    	$this->constant = $this->generateConstant($request->name);
    	

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

    	return var_dump(is_file($newRepo));
    	//print_r($repoactual);
    }










    

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



    public function generateConstant($table)
    {
       return ['_table_' => $table,
	   '_model_plural_' => $this->pluralize(ucwords($table)),
	   '_object_plural_' => $table,
	   '_model_' => ucwords($this->singularize($table)),
	   '_object_' => $this->singularize($table)
	   ];
    }	
}

/*
,
	   '$_rules_$' => '',
	   '$_fields_db_$'=>'',
	   '$_fields_db_migrate_$'=>''
*/