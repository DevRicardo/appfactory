<?php namespace Modules\Phases\Entities;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phase extends Model {

     use SoftDeletes; 
    /*
    * Array con los campos que se pueden guardar de forma 
    * masiba
    */
    protected $dates = ['deleted_at'];

    protected $fillable = [
    
        'name','description','peso_inicial','peso_final',

    ];

   
    /*

    public function categorie()
    {
    	return $this->belongsTo('Modules\Projects\Entities\Categorie');
    }

    public function states()
    {
    	return $this->belongsToMany('Modules\Projects\Entities\State')->withPivot('state_start', 'state_end');
    }
    */

}
