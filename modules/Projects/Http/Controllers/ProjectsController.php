<?php namespace Modules\Projects\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Projects\Http\Requests\CreateProjectsRequest;
use Modules\Projects\Http\Requests\UpdateProjectsRequest;
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
       
       $view = view('projects::index');

        return $view;     
  }


    public function listElements(Request $request)
    {
        
        $projects = $this->projectrepository; 
        $view = view('projects::list');
        //params at view       

        $result['vista'] = $view->with("projects",$projects->paginate(4))->render();

        return response()->json($result); 
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
  public function edit($id)
  {

        $categories = Categorie::ListForSelect();
        $project = $this->projectrepository->find($id);

        $view = view('projects::edit');
        //params at view
        $view->with("categories",$categories);
        $view->with('project', $project);

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

        $resultMessage = null;
        $this->files->setType(Files::IMAGE);
        $is_succesfull = $this->files->upload($request,'image');
        if( $is_succesfull || $is_succesfull == null )
        {
            try
            {
               DB::beginTransaction(); 
               
               unset($request['_token']);
               unset($request['_method']);          
               $project = $this->projectrepository->updateRich($request->all(),$id); 
               if($is_succesfull != null)
               {
                   
                   $image = $this->files->getNewName(); 
                   $this->projectrepository->update(['image'=>$image],$id);


               }
               

               DB::commit();

               $resultMessage = $this->message->emit(Messages::SUCCESS,['Projects update succesfull']); 
            
            } catch (Exception $e) {
               DB::rollBack(); 
               $resultMessage = $this->message->emit(Messages::DANGER,['Error to the update project']); 
            }          
            
        }
        else
        {
            $resultMessage = $this->message->emit(Messages::DANGER,['Error to the update project']);
        }
                
        return response()->json($resultMessage);
                     
  }

    /**
    * Elimina un proyecto
    *
    * @param  integer  $id
    */
  public function destroy($id)
  {
      $resultMessage = null;
      $result = $this->projectrepository->softdelete($id);   
      if($result)
      {
          $resultMessage = $this->message->emit(Messages::SUCCESS,['Project deleted']); 
      } 
      else
      {
          $resultMessage = $this->message->emit(Messages::DANGER,['Project not deleted']); 

      }

      return response()->json($resultMessage);
  }
  
}