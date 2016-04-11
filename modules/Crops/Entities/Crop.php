<?php namespace Modules\Crops\Entities;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Crop extends Model {

     use SoftDeletes; 
    /*
    * Array con los campos que se pueden guardar de forma 
    * masiba
    */
    protected $dates = ['deleted_at'];

    protected $fillable = [
    
        'name','description',

    ];

   
   

    public function ponds()
    {
    	return $this->hasMany('Modules\Ponds\Entities\Pond');
    }

    /*
    public function states()
    {
    	return $this->belongsToMany('Modules\Projects\Entities\State')->withPivot('state_start', 'state_end');
    }
    */

}
