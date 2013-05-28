<?php namespace Sorora\Empower\Models;

class SupportModel extends \Eloquent
{
    public $errors;

    public function validate()
    {
        $validation = \Validator::make($this->attributes, static::$rules);

        if ($validation->passes()) {
            return true;
        }

        $this->errors = $validation->messages();

        return false;
    }
}
