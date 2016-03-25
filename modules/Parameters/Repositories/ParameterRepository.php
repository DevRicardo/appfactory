<?php
namespace Modules\Parameters\Repositories;

use App\Repositories\Repository;
use Modules\Parameters\Entities\Parameter;
use Schema;
use DB;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ParameterRepository extends Repository
{
    

    
    public function model(){
    	return 'Modules\Parameters\Entities\Parameter';
    }


    public function search($params)
    {
    	unset($params['page']);
    	# code...
    	$query = Parameter::query();


        
    	foreach ($params as $key => $value) {
    		# code...
            
            if($value !== '0'){
                
                $query->where($key,$value);    
            }else{
                //var_dump($value)."<br>";
            }
    		
    	}
       
    	return $query;
    }



     public function contentSelect()
    {
        $crops = Parameter::all();
        $array_select[] = "Seleccione";

        foreach ($crops as $key => $value) {
            # code...
            $array_select[$value->name] = $value->name;
        }

        return $array_select;
    }

    
}
