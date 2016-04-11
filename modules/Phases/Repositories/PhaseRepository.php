<?php
namespace Modules\Phases\Repositories;

use App\Repositories\Repository;
use Modules\Phases\Entities\Phase;
use Schema;
use DB;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PhaseRepository extends Repository
{
    

    
    public function model(){
    	return 'Modules\Phases\Entities\Phase';
    }


    public function contentSelect()
    {
    	$phases = Phase::all();
    	$array_select[] = "Seleccione";

    	foreach ($phases as $key => $value) {
    		# code...
    		$array_select[$value->id] = $value->name;
    	}

    	return $array_select;
    }

    
}
