<?php namespace Modules\Ponds\Entities;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pond extends Model {

     use SoftDeletes; 
    /*
    * Array con los campos que se pueden guardar de forma 
    * masiba
    */
    protected $dates = ['deleted_at'];

    protected $fillable = [
    
        'crop_id','phase_id','siembra','maximo','minimo',

    ];

   
    

    public function phases()
    {
    	return $this->belongsTo('Modules\Phases\Entities\Phase','phase_id');
    }
    
    public function crops()
    {
    	return $this->belongsTo('Modules\Crops\Entities\Crop','crop_id');
    }
    

}
