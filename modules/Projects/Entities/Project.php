<?php namespace Modules\Projects\Entities;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model {

     use SoftDeletes; 
    /*
    * Array con los campos que se pueden guardar de forma 
    * masiba
    */
    protected $dates = ['deleted_at'];

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