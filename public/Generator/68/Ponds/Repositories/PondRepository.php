<?php
namespace Modules\Ponds\Repositories;

use App\Repositories\Repository;
use Modules\Ponds\Entities\Pond;
use Schema;
use DB;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PondRepository extends Repository
{
    

    
    public function model(){
    	return 'Modules\Ponds\Entities\Pond';
    }

    
}
