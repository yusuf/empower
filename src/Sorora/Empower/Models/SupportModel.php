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
        // Change any unique:table_name or exists:table_name to prefixed table names
        static::$rules = str_replace(
                            array('exists:', 'unique:'),
                            array('exists:'.static::$dbprefix, 'unique:'.static::$dbprefix),
                            static::$rules
                        );
        $this->table = static::$dbprefix.$this->table;
    }

    /**
     * Validates on save
     *
     * @return bool
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($item)
        {
            return $item->validate();
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
     * @return obj|null
     */
    public function getFromField($field, $value)
    {
        return $this->where($field, $value)->firstOrFail();
    }

    /**
     * Changes the $rules to ignore certain IDs on unique.
     * These MUST be the last in the rules list
     *
     * @return void
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
     * @return string
     */
    public static function getDbPrefix()
    {
        return static::$dbprefix;
    }
}
