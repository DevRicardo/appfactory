<?php namespace Modules\Phases\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Phases\Http\Requests\CreatePhasesRequest;
use Modules\Phases\Http\Requests\UpdatePhasesRequest;
use Modules\Phases\Repositories\PhaseRepository;
use Modules\Phases\Entities\Phase;
use Illuminate\Http\Request;
use App\Tools\Messages;
use App\Tools\Files;
use Response;
use DB;

class PhasesController extends Controller {

    private $phaserepository;
    private $message;
    private $files;

  public function __construct(PhaseRepository $phaseRepo, Messages $message, Files $file)
  {
        $this->phaserepository = $phaseRepo;
        $this->message = $message;
        $this->files = $file;
  }
  
  /**
    * Mustar el listado de todos los phases 
    */
  public function index()
  {
       
       $view = view('phases::index');

        return $view;     
  }


    public function listElements(Request $request)
    {
        
        $phases = $this->phaserepository; 
        $view = view('phases::list');
        //params at view       
        
        $result['vista'] = $view->with("phases",$phases->paginate(4))->render();

        return response()->json($result); 
    }


    /**
    * muestra la vista para crear phase
    *
    */
  public function create()
  {
    
      $view = view('phases::create');
      //params at view
      //$view->with("categories",$categories);

      return $view;
  }


    /**
    * Muestra el formulario para editar proyecto
    */
  public function edit($id)
  {

        
        $project = $this->phaserepository->find($id);

        $view = view('phases::edit');
        //params at view
        $view->with('phase', $project);

        return $view;
  }

      /**
    * Muestra el formulario para editar proyecto
    */
  public function show($id)
  {

        
        $project = $this->phaserepository->find($id);

        $view = view('phases::show');
        //params at view
        $view->with('phase', $project);

        return $view;
  }

    /**
    * crea un nuevo proyecto
    *
    * @param  CreateProjectsRequest  $data
    * @return json
    */ 
  public function store(CreatePhasesRequest $request)
  {   
      $resultMessage = null;
       
      try
        {
           DB::beginTransaction(); 
           
                      
           $phase = $this->phaserepository->create($request->all()); 
          
           DB::commit();

           $resultMessage = $this->message->emit(Messages::SUCCESS,['Phases create succesfull']); 
        
        } catch (Exception $e) {
           DB::rollBack(); 
           $resultMessage = $this->message->emit(Messages::DANGER,['Error to the create phase']); 
        }          
            
        
            
        return response()->json($resultMessage);
  }


    /**
    * Actualiza un phases
    *
    * @param  UpdatePhasesRequest  $data
    * @return json
    */
  public function update(UpdatePhasesRequest $request, $id)
  {

      $resultMessage = null;
        
      try
      {
         DB::beginTransaction(); 
         
         unset($request['_token']);
         unset($request['_method']);          
         $phase = $this->phaserepository->updateRich($request->all(),$id); 
                      

         DB::commit();

         $resultMessage = $this->message->emit(Messages::SUCCESS,['Phases update succesfull']); 
      
      } catch (Exception $e) {
         DB::rollBack(); 
         $resultMessage = $this->message->emit(Messages::DANGER,['Error to the update phase']); 
      }          
            
        
                
        return response()->json($resultMessage);
                     
  }

    /**
    * Elimina un phases
    *
    * @param  integer  $id
    */
  public function destroy($id)
  {
      $resultMessage = null;
      $result = $this->phaserepository->softdelete($id);   
      if($result)
      {
          $resultMessage = $this->message->emit(Messages::SUCCESS,['phase deleted']); 
      } 
      else
      {
          $resultMessage = $this->message->emit(Messages::DANGER,['phase not deleted']); 

      }

      return response()->json($resultMessage);
  }
  
}
