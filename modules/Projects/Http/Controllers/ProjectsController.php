<?php namespace Modules\Projects\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Projects\Http\Requests\CreateProjectsRequest;
use Modules\Projects\Repositories\ProjectRepository;
use Modules\Projects\Entities\Project;
use Modules\Projects\Entities\Categorie;
use Illuminate\Http\Request;
use App\Tools\Messages;
use App\Tools\Files;
use Response;
use DB;

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
       $projects = $this->projectrepository->paginate(9); 
       $view = view('projects::index');
        //params at view
        $view->with("projects",$projects);

        return $view;     
	}


    /**
    * muestra la vista para crear proyecto
    *
    */
	public function create()
	{
		$categories = Categorie::ListForSelect();

        $view = view('projects::create');
        //params at view
        $view->with("categories",$categories);

        return $view;
	}


    /**
    * Muestra el formulario para editar proyecto
    */
	public function edit()
	{
        $categories = Categorie::ListForSelect();

        $view = view('projects::edit');
        //params at view
        $view->with("categories",$categories);

        return $view;
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
               DB::beginTransaction(); 
               
               $image = $this->files->getNewName();               
               $project = $this->projectrepository->create($request->all()); 
               
               $this->projectrepository->update(['image'=>$image],$project->id);

               DB::commit();

               $resultMessage = $this->message->emit(Messages::SUCCESS,['Projects create succesfull']); 
            
            } catch (Exception $e) {
               DB::rollBack(); 
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
	public function update(UpdateProjectsRequest $request, $id)
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