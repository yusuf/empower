<?php namespace Sorora\Empower\Models\Repositories;

abstract class EloquentBaseRepository {

    protected $fillable;

    protected $model;

    public $errors;

    public function __construct()
    {
        $model = explode('\\', get_class($this));
        $model = implode('\\', array($model[0], $model[1], $model[2], $model[count($model)-2]));
        $this->model = new $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getFromField($field, $value)
    {
        return $this->model->getFromField($field, $value);
    }

    public function select($fields)
    {
        return $this->model->select($fields);
    }

    public function orderBy($field, $order = null)
    {
        return $this->model->orderBy($field, $order);
    }

    public function lists($value, $key = null)
    {
        return $this->model->lists($value, $key);
    }

    public function exists()
    {
        return $this->model->exists();
    }

    public function newQuery()
    {
        return $this->model->newQuery();
    }

    public function create($input)
    {
        return $this->model->create($input);
    }

    public function update($input)
    {
        return $this->model->update($input);
    }

    public function save($attributes)
    {
        $model = $this->model;
        foreach($attributes AS $attribute => $value)
        {
            $model->$attribute = $value;
        }
        return $model->save();
    }

    public function with($params)
    {
        return $this->model->with($params);
    }

    public function delete()
    {
        return $this->model->delete();
    }

    public function uniqueExcept($fields)
    {
        return $this->model->uniqueExcept($fields);
    }

    public function getDbPrefix()
    {
        return $this->model->getDbPrefix();
    }

}