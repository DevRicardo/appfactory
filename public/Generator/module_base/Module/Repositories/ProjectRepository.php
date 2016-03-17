<?php
namespace Modules\_model_plural_\Repositories;

use App\Repositories\Repository;
use Modules\_model_plural_\Entities\_model_;
use Schema;
use DB;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class _model_Repository extends Repository
{
    

    
    public function model(){
    	return 'Modules\_model_plural_\Entities\_model_';
    }

    
}
