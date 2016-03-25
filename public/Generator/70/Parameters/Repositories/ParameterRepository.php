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

    
}
