<?php
namespace Modules\Projects\Repositories;

use App\Repositories\Repository;
use Modules\Projects\Entities\Project;
use Schema;
use DB;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProjectRepository extends Repository
{
    

    
    public function model(){
    	return 'Modules\Projects\Entities\Project';
    }

    
}