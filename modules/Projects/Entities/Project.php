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
        'categorie_id',
        'state_id'

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