<?php namespace Modules\$_model_plural_$\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\$_model_plural_$\Http\Requests\Create$_model_plural_$Request;
use Modules\$_model_plural_$\Http\Requests\Update$_model_plural_$Request;
use Modules\$_model_plural_$\Repositories\$_model_$Repository;
use Modules\$_model_plural_$\Entities\$_model_$;
use Illuminate\Http\Request;
use App\Tools\Messages;
use App\Tools\Files;
use Response;
use DB;

class $_model_plural_$Controller extends Controller {

    private $$_object_$repository;
    private $message;
    private $files;

  public function __construct($_model_$Repository $$_object_$Repo, Messages $message, Files $file)
  {
        $this->$_object_$repository = $$_object_$Repo;
        $this->message = $message;
        $this->files = $file;
  }
  
  /**
    * Mustar el listado de todos los $_table_$ 
    */
  public function index()
  {
       
       $view = view('$_table_$::index');

        return $view;     
  }


    public function listElements(Request $request)
    {
        
        $$_object_plural_$ = $this->$_object_$repository; 
        $view = view('$_object_plural_$::list');
        //params at view       
        
        $result['vista'] = $view->with("$_object_plural_$",$$_object_plural_$->paginate(4))->render();

        return response()->json($result); 
    }


    /**
    * muestra la vista para crear $_object_$
    *
    */
  public function create()
  {
    
      $view = view('$_object_plural_$::create');
      //params at view
      //$view->with("categories",$categories);

      return $view;
  }


    /**
    * Muestra el formulario para editar proyecto
    */
  public function edit($id)
  {

        
        $project = $this->projectrepository->find($id);

        $view = view('$_object_plural_$::edit');
        //params at view
        $view->with('$_object_$', $project);

        return $view;
  }

    /**
    * crea un nuevo proyecto
    *
    * @param  CreateProjectsRequest  $data
    * @return json
    */ 
  public function store(Create$_model_plural_$Request $request)
  {   
      $resultMessage = null;
       
      try
        {
           DB::beginTransaction(); 
           
                      
           $$_object_$ = $this->$_object_$repository->create($request->all()); 
          
           DB::commit();

           $resultMessage = $this->message->emit(Messages::SUCCESS,['$_model_plural_$ create succesfull']); 
        
        } catch (Exception $e) {
           DB::rollBack(); 
           $resultMessage = $this->message->emit(Messages::DANGER,['Error to the create $_object_$']); 
        }          
            
        
            
        return response()->json($resultMessage);
  }


    /**
    * Actualiza un $_object_plural_$
    *
    * @param  Update$_model_plural_$Request  $data
    * @return json
    */
  public function update(Update$_model_plural_$Request $request, $id)
  {

      $resultMessage = null;
        
      try
      {
         DB::beginTransaction(); 
         
         unset($request['_token']);
         unset($request['_method']);          
         $$_object_$ = $this->$_object_$repository->updateRich($request->all(),$id); 
                      

         DB::commit();

         $resultMessage = $this->message->emit(Messages::SUCCESS,['$_model_plural_$ update succesfull']); 
      
      } catch (Exception $e) {
         DB::rollBack(); 
         $resultMessage = $this->message->emit(Messages::DANGER,['Error to the update $_object_$']); 
      }          
            
        
                
        return response()->json($resultMessage);
                     
  }

    /**
    * Elimina un $_object_plural_$
    *
    * @param  integer  $id
    */
  public function destroy($id)
  {
      $resultMessage = null;
      $result = $this->$_object_$repository->softdelete($id);   
      if($result)
      {
          $resultMessage = $this->message->emit(Messages::SUCCESS,['$_object_$ deleted']); 
      } 
      else
      {
          $resultMessage = $this->message->emit(Messages::DANGER,['$_object_$ not deleted']); 

      }

      return response()->json($resultMessage);
  }
  
}