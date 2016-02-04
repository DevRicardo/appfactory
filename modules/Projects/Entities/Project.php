<?php namespace Modules\Projects\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Project extends Model {


    /*
    * Array con los campos que se pueden guardar de forma 
    * masiba
    */
    protected $fillable = [
    
        'image',
        'name',
        'description',
        'user_id',
        'categorie_id'

    ];

    /*
    * 
    */
    public static $rules = [
        "amb_placa" => "required|max:20",
        "amb_modelo" => "required|max:100",
        "amb_tarjetapropiedad" => "required|max:100",
        "amb_modalidad" => "required|in:TERRESTRE,AÉREA"
    ];

    

    public function categorie()
    {
    	return $this->belongsTo('Modules\Projects\Entities\Categorie');
    }

    public function states()
    {
    	return $this->belongsToMany('Modules\Projects\Entities\State')->withPivot('state_start', 'state_end');
    }







}