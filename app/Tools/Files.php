<?php
namespace App\Tools;

use Illuminate\Http\Request;
use App\Tools\Messages;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as archive;
use Auth;



class Files
{

	private $user_id;
	private $arrayType;
	private $type;
	private $size;
	private $error;


	/**
    * Tipos predefinidos
    * */
	const DOCUMENT  = 'document';
	const COMPRESS  = 'compress';
	const IMAGE     = 'image';
	const VIDEO     = 'video';
	const AUDIO     = 'audio';


	public function __construct()
	{
		$this->user_id = Auth::user()->id;
		$this->arrayType = [
            'document'=>['doc','docx','xls','xlsx','odt','ods','odp','pdf'],
            'compress'=>['zip','rar','tar','tar.gz'],
            'image'   =>['jpg','jpeg','png','gif'],
            'video'   =>['avi','mp4'],
            'audio'   =>['mp3','acc']
		];
		$this->size = 3; // megas
		$this->error = [];

	}

    /**
    * Sobre escribe el valor del tipo de archivo a validar
    * 
    * @param  string  $data
    * @return array
    */
	public function setType($type)
	{
        $this->type = $this->arrayType[$type];
	}

    /**
    * Sobre escribe el valor del tamaño maximo de archivo permitido
    * 
    * @param  int  $data
    * @return int
    */
	public function setSize($size)
	{
		$this->size = $size;
	}


	/**
    * carga un fichero al servidor
    * 
    * @param  Request  $data
    * @return json
    */ 
	public function upload(Request $request, $campo){
		$file = $request->file($campo);
		$nombre = $file->getClientOriginalName();
		$extention = $file->getClientOriginalExtension();
		Storage::disk('local')->put($this->generateNewName().".".$extention, archive::get($file));
    }
    

	/**
    * renombrer fichero
    * 
    * @param  string  $file
    * @return string
    */ 
	public function generateNewName(){
		$date_create = date('Y-m-d-s-i');

		return md5($this->user_id."-"."-".$date_create);
	}
    

    /**
    * validar extencion y tamaño validos
    * 
    * @param  string  $extention
    * @param  integer $size
    * @return string
    */ 
	public function validate($extention, $size)
	{
        // comprobar extencion
		if(array_key_exists($extencion, $this->type))
		{
			// comprobar tamaño
            if($size <= $this->size){
            	return true;
            }else{
            	$this->error[] = 'size';
            	return false;
            }
		}else{
			$this->error[] = 'type';
			return false;
		}
	}



}