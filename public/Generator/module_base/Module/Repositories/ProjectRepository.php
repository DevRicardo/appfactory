<?php
namespace Modules\$_modelo_plural_$\Repositories;

use App\Repositories\Repository;
use Modules\$_modelo_plural_$\Entities\Project;
use Schema;
use DB;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class $_modelo_$Repository extends Repository
{
    

    
    public function model(){
    	return 'Modules\$_modelo_plural_$\Entities\$_modelo_$';
    }

    
}