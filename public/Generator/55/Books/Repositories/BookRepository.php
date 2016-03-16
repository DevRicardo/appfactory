<?php
namespace Modules\Books\Repositories;

use App\Repositories\Repository;
use Modules\Books\Entities\Project;
use Schema;
use DB;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BookRepository extends Repository
{
    

    
    public function model(){
    	return 'Modules\Books\Entities\Book';
    }

    
}
