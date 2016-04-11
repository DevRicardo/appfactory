<?php
namespace Modules\Crops\Repositories;

use App\Repositories\Repository;
use Modules\Crops\Entities\Crop;
use Schema;
use DB;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CropRepository extends Repository
{
    

    
    public function model(){
    	return 'Modules\Crops\Entities\Crop';
    }



    public function contentSelect()
    {
    	$crops = Crop::all();
    	$array_select[] = "Seleccione";

    	foreach ($crops as $key => $value) {
    		# code...
    		$array_select[$value->id] = $value->name;
    	}

    	return $array_select;
    }

    
}
