<?php namespace Sorora\Empower\Controllers;

class PanelController extends EmpowerController {

    public function __construct ()
    {
        parent::__construct();
        $this->data['baseurl'] = substr($this->baseurl, 0, -1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->data['title'] = ucwords($this->data['baseurl']);
        return \View::make('empower::index', $this->data);
    }
}