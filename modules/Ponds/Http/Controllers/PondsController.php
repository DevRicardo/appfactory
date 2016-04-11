<?php namespace Modules\Ponds\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Ponds\Http\Requests\CreatePondsRequest;
use Modules\Ponds\Http\Requests\UpdatePondsRequest;
use Modules\Ponds\Repositories\PondRepository;
use Modules\Phases\Repositories\PhaseRepository;
use Modules\Crops\Repositories\CropRepository;
use Modules\Ponds\Entities\Pond;
use Modules\Phases\Entities\Phase;
use Modules\Crops\Entities\Crops;
use Illuminate\Http\Request;
use App\Tools\Messages;
use App\Tools\Files;
use Response;
use DB;
use Input;

class PondsController extends Controller {

    private $pondrepository;
    private $phaserepository;
    private $cropsrepository;
    private $message;
    private $files;

  public function __construct(CropRepository $cropsrepository, PondRepository $pondRepo, PhaseRepository $phaserepository, Messages $message, Files $file)
  {
        $this->pondrepository = $pondRepo;
        $this->phaserepository = $phaserepository;
        $this->cropsrepository = $cropsrepository;
        $this->message = $message;
        $this->files = $file;
  }
  
  /**
    * Mustar el listado de todos los ponds 
    */
  public function index()
  {
       $phases = $this->phaserepository->contentSelect(); 
       $crops = $this->cropsrepository->contentSelect(); 
       $view = view('ponds::index');

       $view->with("phases",$phases);
       $view->with("crops",$crops); 

        return $view;     
  }


    public function listElements(Request $request)
    {
        $pond = null;  
        $params = count($request->all());
        if($params  > 1 ){
            $ponds = $this->pondrepository->search($request->all()); 
        }else{
            $ponds = $this->pondrepository; 
        }

                    
        
        $view = view('ponds::list');
        //params at view       
         
        $result['vista'] = $view->with("ponds",$ponds->paginate(4))->render();

        return response()->json($result); 
    }


    /**
    * muestra la vista para crear pond
    *
    */
  public function create()
  {
      $phases = $this->phaserepository->contentSelect();
      $view = view('ponds::create');
      //params at view
      $view->with("phases",$phases);

      return $view;
  }


    /**
    * Muestra el formulario para editar proyecto
    */
  public function edit($id)
  {

        
        $project = $this->pondrepository->find($id);
        $phases = $this->phaserepository->contentSelect();
        $view = view('ponds::edit');
        //params at view
        $view->with('pond', $project);
        $view->with("phases",$phases);

        return $view;
  }

      /**
    * Muestra el formulario para editar proyecto
    */
  public function show($id)
  {

        
        $project = $this->pondrepository->find($id);
        $phases = $this->phaserepository->contentSelect();

        $view = view('ponds::show');
        //params at view
        $view->with('pond', $project);
        $view->with("phases",$phases);

        return $view;
  }

    /**
    * crea un nuevo proyecto
    *
    * @param  CreateProjectsRequest  $data
    * @return json
    */ 
  public function store(CreatePondsRequest $request)
  {   
      $resultMessage = null;
       
      try
        {
           DB::beginTransaction(); 
           
                      
           $pond = $this->pondrepository->create($request->all()); 
          
           DB::commit();

           $resultMessage = $this->message->emit(Messages::SUCCESS,['Ponds create succesfull']); 
        
        } catch (Exception $e) {
           DB::rollBack(); 
           $resultMessage = $this->message->emit(Messages::DANGER,['Error to the create pond']); 
        }          
            
        
            
        return response()->json($resultMessage);
  }


    /**
    * Actualiza un ponds
    *
    * @param  UpdatePondsRequest  $data
    * @return json
    */
  public function update(UpdatePondsRequest $request, $id)
  {

      $resultMessage = null;
        
      try
      {
         DB::beginTransaction(); 
         
         unset($request['_token']);
         unset($request['_method']);          
         $pond = $this->pondrepository->updateRich($request->all(),$id); 
                      

         DB::commit();

         $resultMessage = $this->message->emit(Messages::SUCCESS,['Ponds update succesfull']); 
      
      } catch (Exception $e) {
         DB::rollBack(); 
         $resultMessage = $this->message->emit(Messages::DANGER,['Error to the update pond']); 
      }          
            
        
                
        return response()->json($resultMessage);
                     
  }

    /**
    * Elimina un ponds
    *
    * @param  integer  $id
    */
  public function destroy($id)
  {
      $resultMessage = null;
      $result = $this->pondrepository->softdelete($id);   
      if($result)
      {
          $resultMessage = $this->message->emit(Messages::SUCCESS,['pond deleted']); 
      } 
      else
      {
          $resultMessage = $this->message->emit(Messages::DANGER,['pond not deleted']); 

      }

      return response()->json($resultMessage);
  }
  
}
