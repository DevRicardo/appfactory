<?php namespace Modules\Projects\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Projects\Http\Requests\CreateProjectsRequest;
use Modules\Projects\Repositories\ProjectRepository;
use Modules\Projects\Entities\Project;
use Illuminate\Http\Request;
use App\Tools\Messages;
use App\Tools\Files;
use Response;

class ProjectsController extends Controller {

    private $projectrepository;
    private $message;
    private $files;

	public function __construct(ProjectRepository $projectRepo, Messages $message, Files $file)
	{
        $this->projectrepository = $projectRepo;
        $this->message = $message;
        $this->files = $file;
	}
	
	/**
    * Mustar el listado de todos los proyectos 
    */
	public function index()
	{
		return view('projects::index');
	}


    /**
    * muestra la vista para crear proyecto
    *
    */
	public function create()
	{
		return view('projects::create');
	}


    /**
    * Muestra el formulario para editar proyecto
    */
	public function edit()
	{

	}

    /**
    * crea un nuevo proyecto
    *
    * @param  CreateProjectsRequest  $data
    * @return json
    */ 
	public function store(CreateProjectsRequest $request)
	{   
        $resultMessage = null;
        $this->files->setType(Files::IMAGE);
        $is_succesfull = $this->files->upload($request,'image');
        if( $is_succesfull )
        {
            try
            {
               $project = Project::create($request->all()); 
               $resultMessage = $this->message->emit(Messages::SUCCESS,['Projects create succesfull']); 
            
            } catch (Exception $e) {
               $resultMessage = $this->message->emit(Messages::DANGER,['Error to the create project']); 
            }          
            
        }
        else
        {
            $resultMessage = $this->message->emit(Messages::DANGER,['Error to the create project']);
        }
        		
        return response()->json($resultMessage);
	}


    /**
    * Actualiza un proyecto
    *
    * @param  UpdateProjectsRequest  $data
    * @return json
    */
	public function update(Request $request, $id)
	{

	}

    /**
    * Elimina un proyecto
    *
    * @param  integer  $id
    */
	public function destroy($id)
	{

	}
	
}