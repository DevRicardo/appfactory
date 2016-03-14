<?php namespace Modules\Generator\Entities;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model {

    use SoftDeletes; 
    /*
    * Array con los campos que se pueden guardar de forma 
    * masiba
    */
    protected $dates = ['deleted_at'];

    protected $fillable = [
    
        'name',
        'type',
        'length',
        'html_component',
        'attributes',
        'validations',
        'project_id'

    ];

    


}