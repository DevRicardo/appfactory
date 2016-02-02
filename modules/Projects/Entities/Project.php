<?php namespace Modules\Projects\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Project extends Model {



    protected $fillable = [
    
        'image',
        'name',
        'description',
        'user_id',
        'categorie_id'

    ];







}