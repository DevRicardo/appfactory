<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Container\Container as App;
/**
* 
*/
abstract class Repository implements RepositoryInterface
{

	/**
     * @var App
     */
    private $app;

    /**
     * @var
     */
    protected $model;

	
	function __construct(App $app)
	{
		$this->app = $app;
		$this->makeModel();
	}


	/**
	 * contiene el modelo especificado para realizar las operaciones
     * @param none 
     */
	abstract function model();


	/**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*')) {
        
        return $this->model->get($columns);
    }

    
    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 1, $columns = array('*')) {
        
        return $this->model->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data) {
        return $this->model->create($data);
    }

    /**
     * save a model without massive assignment
     *
     * @param array $data
     * @return bool
     */
    public function saveModel(array $data)
    {
        foreach ($data as $k => $v) {
            $this->model->$k = $v;
        }
        return $this->model->save();
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute="id") {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * @param  array  $data
     * @param  $id
     * @return mixed
     */
    public function updateRich(array $data, $id) {
        if (!($model = $this->model->findOrFail($id))) {
            return false;
        }

        return $model->fill($data)->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id) {
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*')) {
        
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*')) {
        
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findAllBy($attribute, $value, $columns = array('*')) {
        
        return $this->model->where($attribute, '=', $value)->get($columns);
    }

        /**
        * @return array assoc
        */

    	public function relations()
    	{
            return get_class_methods($this->model);
    	}



	public function makeModel() {
        $model = $this->app->make($this->model());
        return $this->model = $model;
    }





}

