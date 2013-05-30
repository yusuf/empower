<?php namespace Sorora\Empower\Models;

class SupportModel extends \Eloquent {
    
    public $errors;

    public static $rules;

    protected static $dbprefix;

    /**
     * Prefixes any tables that need it
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        static::$dbprefix = \Config::get('empower::dbprefix');

        $this->table = static::$dbprefix.$this->table;
    }

    /**
     * Prefixes any tables that need it
     *
     * @return bool
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($post)
        {
            return $post->validate();
        });
    }

    /**
     * Validates input based on the rules set on the method
     *
     * @return bool
     */
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

    /**
     * Changes the $rules to ignore certain IDs on unique.
     * These MUST be the last in the rules list
     *
     * @return bool
     */
    public function uniqueExcept($fields)
    {
        $fields = (is_array($fields)) ?: array($fields);
        foreach($fields AS $field)
        {
            static::$rules[$field] .= ','.$this->id;
        }
    }

    /**
     * Returns the database prefix
     *
     * @return bool
     */
    public static function getDbPrefix()
    {
        return static::$dbprefix;
    }
}
