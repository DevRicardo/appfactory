<?php namespace Modules\Parameters\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Parameters\Http\Requests\CreateParametersRequest;
use Modules\Parameters\Http\Requests\UpdateParametersRequest;
use Modules\Parameters\Repositories\ParameterRepository;
use Modules\Parameters\Entities\Parameter;
use Illuminate\Http\Request;
use App\Tools\Messages;
use App\Tools\Files;
use Response;
use DB;

class ParametersController extends Controller {

    private $parameterrepository;
    private $message;
    private $files;

  public function __construct(ParameterRepository $parameterRepo, Messages $message, Files $file)
  {
        $this->parameterrepository = $parameterRepo;
        $this->message = $message;
        $this->files = $file;
  }
  
  /**
    * Mustar el listado de todos los parameters 
    */
  public function index()
  {
       
       $view = view('parameters::index');

        return $view;     
  }


    public function listElements(Request $request)
    {
        
        $parameters = $this->parameterrepository; 
        $view = view('parameters::list');
        //params at view       
        
        $result['vista'] = $view->with("parameters",$parameters->paginate(4))->render();

        return response()->json($result); 
    }


    /**
    * muestra la vista para crear parameter
    *
    */
  public function create()
  {
    
      $view = view('parameters::create');
      //params at view
      //$view->with("categories",$categories);

      return $view;
  }


    /**
    * Muestra el formulario para editar proyecto
    */
  public function edit($id)
  {

        
        $project = $this->parameterrepository->find($id);

        $view = view('parameters::edit');
        //params at view
        $view->with('parameter', $project);

        return $view;
  }

      /**
    * Muestra el formulario para editar proyecto
    */
  public function show($id)
  {

        
        $project = $this->parameterrepository->find($id);

        $view = view('parameters::show');
        //params at view
        $view->with('parameter', $project);

        return $view;
  }

    /**
    * crea un nuevo proyecto
    *
    * @param  CreateProjectsRequest  $data
    * @return json
    */ 
  public function store(CreateParametersRequest $request)
  {   
      $resultMessage = null;
       
      try
        {
           DB::beginTransaction(); 
           
                      
           $parameter = $this->parameterrepository->create($request->all()); 
          
           DB::commit();

           $resultMessage = $this->message->emit(Messages::SUCCESS,['Parameters create succesfull']); 
        
        } catch (Exception $e) {
           DB::rollBack(); 
           $resultMessage = $this->message->emit(Messages::DANGER,['Error to the create parameter']); 
        }          
            
        
            
        return response()->json($resultMessage);
  }


    /**
    * Actualiza un parameters
    *
    * @param  UpdateParametersRequest  $data
    * @return json
    */
  public function update(UpdateParametersRequest $request, $id)
  {

      $resultMessage = null;
        
      try
      {
         DB::beginTransaction(); 
         
         unset($request['_token']);
         unset($request['_method']);          
         $parameter = $this->parameterrepository->updateRich($request->all(),$id); 
                      

         DB::commit();

         $resultMessage = $this->message->emit(Messages::SUCCESS,['Parameters update succesfull']); 
      
      } catch (Exception $e) {
         DB::rollBack(); 
         $resultMessage = $this->message->emit(Messages::DANGER,['Error to the update parameter']); 
      }          
            
        
                
        return response()->json($resultMessage);
                     
  }

    /**
    * Elimina un parameters
    *
    * @param  integer  $id
    */
  public function destroy($id)
  {
      $resultMessage = null;
      $result = $this->parameterrepository->softdelete($id);   
      if($result)
      {
          $resultMessage = $this->message->emit(Messages::SUCCESS,['parameter deleted']); 
      } 
      else
      {
          $resultMessage = $this->message->emit(Messages::DANGER,['parameter not deleted']); 

      }

      return response()->json($resultMessage);
  }
  
}
