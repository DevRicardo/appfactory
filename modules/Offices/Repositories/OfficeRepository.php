<?php
namespace Modules\Offices\Repositories;

use App\Repositories\Repository;
use Modules\Offices\Entities\Office;
use Schema;
use DB;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OfficeRepository extends Repository
{
    

    
    public function model(){
    	return 'Modules\Offices\Entities\Office';
    }

    
}
