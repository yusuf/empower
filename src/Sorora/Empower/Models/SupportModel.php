<?php namespace Sorora\Empower\Models;

class SupportModel extends \Eloquent {
    
    public $errors;

    protected static $dbprefix;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        static::$dbprefix = \Config::get('empower::dbprefix');

        $this->table = static::$dbprefix.$this->table;
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($post)
        {
            return $post->validate();
        });
    }

    public function validate()
    {
        $validation = \Validator::make($this->attributes, static::$rules);
        
        if ($validation->passes())
        {
            return true;
        }

        $this->errors = $validation->messages();

        return false;
    }
}
