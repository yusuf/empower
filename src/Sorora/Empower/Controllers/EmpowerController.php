<?php namespace Sorora\Empower\Controllers;

class EmpowerController extends \BaseController {

    protected $baseurl;
    protected $data;

    public function __construct()
    {
        $this->data = array(
            'baseurl' => $this->baseurl = \Config::get('empower::baseurl').'.'
        );
    }
}