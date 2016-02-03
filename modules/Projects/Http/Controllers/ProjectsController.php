<?php namespace Modules\Projects\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Projects\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Request;

class ProjectsController extends Controller {

    private $projectrepository;

	public function __construct(ProjectRepository $projectRepo)
	{
        $this->projectrepository = $projectRepo;
	}
	
	public function index()
	{
		return view('projects::index');
	}



	public function create()
	{
		return view('projects::create');
	}



	public function edit()
	{

	}


	public function save(Request $request, $id)
	{

	}


	public function destroy()
	{

	}
	
}