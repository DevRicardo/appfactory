<?php namespace Modules\Crops\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Crops\Http\Requests\CreateCropsRequest;
use Modules\Crops\Http\Requests\UpdateCropsRequest;
use Modules\Crops\Repositories\CropRepository;
use Modules\Crops\Entities\Crop;
use Illuminate\Http\Request;
use App\Tools\Messages;
use App\Tools\Files;
use Response;
use DB;

class CropsController extends Controller {

    private $croprepository;
    private $message;
    private $files;

  public function __construct(CropRepository $cropRepo, Messages $message, Files $file)
  {
        $this->croprepository = $cropRepo;
        $this->message = $message;
        $this->files = $file;
  }
  
  /**
    * Mustar el listado de todos los crops 
    */
  public function index()
  {
       
       $view = view('crops::index');

        return $view;     
  }


    public function listElements(Request $request)
    {
        
        $crops = $this->croprepository; 
        $view = view('crops::list');
        //params at view       
        
        $result['vista'] = $view->with("crops",$crops->paginate(4))->render();

        return response()->json($result); 
    }


    /**
    * muestra la vista para crear crop
    *
    */
  public function create()
  {
    
      $view = view('crops::create');
      //params at view
      //$view->with("categories",$categories);

      return $view;
  }


    /**
    * Muestra el formulario para editar proyecto
    */
  public function edit($id)
  {

        
        $project = $this->croprepository->find($id);

        $view = view('crops::edit');
        //params at view
        $view->with('crop', $project);

        return $view;
  }

      /**
    * Muestra el formulario para editar proyecto
    */
  public function show($id)
  {

        
        $project = $this->croprepository->find($id);

        $view = view('crops::show');
        //params at view
        $view->with('crop', $project);

        return $view;
  }

    /**
    * crea un nuevo proyecto
    *
    * @param  CreateProjectsRequest  $data
    * @return json
    */ 
  public function store(CreateCropsRequest $request)
  {   
      $resultMessage = null;
       
      try
        {
           DB::beginTransaction(); 
           
                      
           $crop = $this->croprepository->create($request->all()); 
          
           DB::commit();

           $resultMessage = $this->message->emit(Messages::SUCCESS,['Crops create succesfull']); 
        
        } catch (Exception $e) {
           DB::rollBack(); 
           $resultMessage = $this->message->emit(Messages::DANGER,['Error to the create crop']); 
        }          
            
        
            
        return response()->json($resultMessage);
  }


    /**
    * Actualiza un crops
    *
    * @param  UpdateCropsRequest  $data
    * @return json
    */
  public function update(UpdateCropsRequest $request, $id)
  {

      $resultMessage = null;
        
      try
      {
         DB::beginTransaction(); 
         
         unset($request['_token']);
         unset($request['_method']);          
         $crop = $this->croprepository->updateRich($request->all(),$id); 
                      

         DB::commit();

         $resultMessage = $this->message->emit(Messages::SUCCESS,['Crops update succesfull']); 
      
      } catch (Exception $e) {
         DB::rollBack(); 
         $resultMessage = $this->message->emit(Messages::DANGER,['Error to the update crop']); 
      }          
            
        
                
        return response()->json($resultMessage);
                     
  }

    /**
    * Elimina un crops
    *
    * @param  integer  $id
    */
  public function destroy($id)
  {
      $resultMessage = null;
      $result = $this->croprepository->softdelete($id);   
      if($result)
      {
          $resultMessage = $this->message->emit(Messages::SUCCESS,['crop deleted']); 
      } 
      else
      {
          $resultMessage = $this->message->emit(Messages::DANGER,['crop not deleted']); 

      }

      return response()->json($resultMessage);
  }
  
}
