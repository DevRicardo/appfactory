<?php namespace Modules\Projects\Entities;
   
use Illuminate\Database\Eloquent\Model;

class State extends Model {

    protected $fillable = [];





    public function projects()
    {
    	return $this->belongsToMany('Modules\Projects\Entities\Project')
    }

}