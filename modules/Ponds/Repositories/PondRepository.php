<?php
namespace Modules\Ponds\Repositories;

use App\Repositories\Repository;
use Modules\Ponds\Entities\Pond;
use Modules\Phases\Entities\Phase;
use Modules\Crops\Entities\Crops;
use Schema;
use DB;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PondRepository extends Repository
{
    

    
    public function model(){
    	return 'Modules\Ponds\Entities\Pond';
    }



    public function search($params)
    {
    	unset($params['page']);
    	# code...
    	$query = Pond::query();
        
    	foreach ($params as $key => $value) {
    		# code...
            
            if($value != 0){
                $query->where($key,$value);    
            }
    		
    	}
        
    	return $query;
    }

    
}
