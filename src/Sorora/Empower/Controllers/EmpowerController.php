<?php namespace Sorora\Empower\Controllers;

class EmpowerController extends \BaseController {

    protected $baseurl;
    protected $data;

    public function __construct()
    {
        $this->baseurl = \Config::get('empower::baseurl').'.';
        $this->data = array(
            'baseurl' => \Config::get('empower::baseurl').'.'
        );
    }
}