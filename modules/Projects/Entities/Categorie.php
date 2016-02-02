<?php namespace Modules\Projects\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model {

    protected $fillable = [];





    public function projects()
    {    	
    	return $this->hasOne('Modules\Projects\Entities\Project');
    }

}