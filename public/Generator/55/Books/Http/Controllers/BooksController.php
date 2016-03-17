<?php namespace Modules\Books\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Books\Http\Requests\CreateBooksRequest;
use Modules\Books\Http\Requests\UpdateBooksRequest;
use Modules\Books\Repositories\BookRepository;
use Modules\Books\Entities\Book;
use Illuminate\Http\Request;
use App\Tools\Messages;
use App\Tools\Files;
use Response;
use DB;

class BooksController extends Controller {

    private $bookrepository;
    private $message;
    private $files;

  public function __construct(BookRepository $bookRepo, Messages $message, Files $file)
  {
        $this->bookrepository = $bookRepo;
        $this->message = $message;
        $this->files = $file;
  }
  
  /**
    * Mustar el listado de todos los books 
    */
  public function index()
  {
       
       $view = view('books::index');

        return $view;     
  }


    public function listElements(Request $request)
    {
        
        $books = $this->bookrepository; 
        $view = view('books::list');
        //params at view       
        
        $result['vista'] = $view->with("books",$books->paginate(4))->render();

        return response()->json($result); 
    }


    /**
    * muestra la vista para crear book
    *
    */
  public function create()
  {
    
      $view = view('books::create');
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

        $view = view('books::edit');
        //params at view
        $view->with('book', $project);

        return $view;
  }

    /**
    * crea un nuevo proyecto
    *
    * @param  CreateProjectsRequest  $data
    * @return json
    */ 
  public function store(CreateBooksRequest $request)
  {   
      $resultMessage = null;
       
      try
        {
           DB::beginTransaction(); 
           
                      
           $book = $this->bookrepository->create($request->all()); 
          
           DB::commit();

           $resultMessage = $this->message->emit(Messages::SUCCESS,['Books create succesfull']); 
        
        } catch (Exception $e) {
           DB::rollBack(); 
           $resultMessage = $this->message->emit(Messages::DANGER,['Error to the create book']); 
        }          
            
        
            
        return response()->json($resultMessage);
  }


    /**
    * Actualiza un books
    *
    * @param  UpdateBooksRequest  $data
    * @return json
    */
  public function update(UpdateBooksRequest $request, $id)
  {

      $resultMessage = null;
        
      try
      {
         DB::beginTransaction(); 
         
         unset($request['_token']);
         unset($request['_method']);          
         $book = $this->bookrepository->updateRich($request->all(),$id); 
                      

         DB::commit();

         $resultMessage = $this->message->emit(Messages::SUCCESS,['Books update succesfull']); 
      
      } catch (Exception $e) {
         DB::rollBack(); 
         $resultMessage = $this->message->emit(Messages::DANGER,['Error to the update book']); 
      }          
            
        
                
        return response()->json($resultMessage);
                     
  }

    /**
    * Elimina un books
    *
    * @param  integer  $id
    */
  public function destroy($id)
  {
      $resultMessage = null;
      $result = $this->bookrepository->softdelete($id);   
      if($result)
      {
          $resultMessage = $this->message->emit(Messages::SUCCESS,['book deleted']); 
      } 
      else
      {
          $resultMessage = $this->message->emit(Messages::DANGER,['book not deleted']); 

      }

      return response()->json($resultMessage);
  }
  
}
