<?php
namespace App\Interfaces;

interface RepositoryInterface {


	public function all($column = ['*']);
	public function paginate($paginate = false, $perPage = 10);

	public function find($id, $column = ['*']);
	public function findBy($attribute, $value, $columns = array('*'));
	public function findAllBy($attribute, $value, $columns = array('*'));
	
	public function create(array $data);

	public function save(array $data):
	public function saveModel(array $data);

	public function update(array $data, $id, $atribute = "id");
	public function updateRich(array $data, $id) ;

	public function delete($id);
	
	public function relations();


}