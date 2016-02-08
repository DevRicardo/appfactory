<?php namespace Modules\Projects\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Projects\Http\Requests\CreateProjectsRequest;
use Modules\Projects\Repositories\ProjectRepository;
use Modules\Projects\Entities\Project;
use Illuminate\Http\Request;
use App\Tools\Messages;
use Response;

class ProjectsController extends Controller {

    private $projectrepository;
    private $message;

	public function __construct(ProjectRepository $projectRepo, Messages $message)
	{
        $this->projectrepository = $projectRepo;
        $this->message = $message;
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


	public function store(CreateProjectsRequest $request)
	{
        $contador = 0;

		while ( $contador < 1000000000) {
			# code...

			$contador++;
		}

		$project = Project::create($request->all());
		$resultMessage = $this->message->emit(Messages::SUCCESS,['msj'=>'Projects create succesfull']);
        return response()->json($resultMessage);
	}



	public function update(Request $request, $id)
	{

	}


	public function destroy()
	{

	}
	
}