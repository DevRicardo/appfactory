<?php namespace Modules\Offices\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Offices\Http\Requests\CreateOfficesRequest;
use Modules\Offices\Http\Requests\UpdateOfficesRequest;
use Modules\Offices\Repositories\OfficeRepository;
use Modules\Offices\Entities\Office;
use Illuminate\Http\Request;
use App\Tools\Messages;
use App\Tools\Files;
use Response;
use DB;

class OfficesController extends Controller {

    private $officerepository;
    private $message;
    private $files;

  public function __construct(OfficeRepository $officeRepo, Messages $message, Files $file)
  {
        $this->officerepository = $officeRepo;
        $this->message = $message;
        $this->files = $file;
  }
  
  /**
    * Mustar el listado de todos los offices 
    */
  public function index()
  {
       
       $view = view('offices::index');

        return $view;     
  }


    public function listElements(Request $request)
    {
        
        $offices = $this->officerepository; 
        $view = view('offices::list');
        //params at view       
        
        $result['vista'] = $view->with("offices",$offices->paginate(4))->render();

        return response()->json($result); 
    }


    /**
    * muestra la vista para crear office
    *
    */
  public function create()
  {
    
      $view = view('offices::create');
      //params at view
      //$view->with("categories",$categories);

      return $view;
  }


    /**
    * Muestra el formulario para editar proyecto
    */
  public function edit($id)
  {

        
        $project = $this->officerepository->find($id);

        $view = view('offices::edit');
        //params at view
        $view->with('office', $project);

        return $view;
  }

      /**
    * Muestra el formulario para editar proyecto
    */
  public function show($id)
  {

        
        $project = $this->officerepository->find($id);

        $view = view('offices::show');
        //params at view
        $view->with('office', $project);

        return $view;
  }

    /**
    * crea un nuevo proyecto
    *
    * @param  CreateProjectsRequest  $data
    * @return json
    */ 
  public function store(CreateOfficesRequest $request)
  {   
      $resultMessage = null;
       
      try
        {
           DB::beginTransaction(); 
           
                      
           $office = $this->officerepository->create($request->all()); 
          
           DB::commit();

           $resultMessage = $this->message->emit(Messages::SUCCESS,['Offices create succesfull']); 
        
        } catch (Exception $e) {
           DB::rollBack(); 
           $resultMessage = $this->message->emit(Messages::DANGER,['Error to the create office']); 
        }          
            
        
            
        return response()->json($resultMessage);
  }


    /**
    * Actualiza un offices
    *
    * @param  UpdateOfficesRequest  $data
    * @return json
    */
  public function update(UpdateOfficesRequest $request, $id)
  {

      $resultMessage = null;
        
      try
      {
         DB::beginTransaction(); 
         
         unset($request['_token']);
         unset($request['_method']);          
         $office = $this->officerepository->updateRich($request->all(),$id); 
                      

         DB::commit();

         $resultMessage = $this->message->emit(Messages::SUCCESS,['Offices update succesfull']); 
      
      } catch (Exception $e) {
         DB::rollBack(); 
         $resultMessage = $this->message->emit(Messages::DANGER,['Error to the update office']); 
      }          
            
        
                
        return response()->json($resultMessage);
                     
  }

    /**
    * Elimina un offices
    *
    * @param  integer  $id
    */
  public function destroy($id)
  {
      $resultMessage = null;
      $result = $this->officerepository->softdelete($id);   
      if($result)
      {
          $resultMessage = $this->message->emit(Messages::SUCCESS,['office deleted']); 
      } 
      else
      {
          $resultMessage = $this->message->emit(Messages::DANGER,['office not deleted']); 

      }

      return response()->json($resultMessage);
  }
  
}
