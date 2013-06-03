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
    /**
     * Find out whether to use a custom view or not
     *
     * @param  string  $package
     * @param  string  $folder
     * @param  string  $view
     * @return string
     */
    protected function viewFromConfig($package, $folder, $view)
    {
        $view_location = $folder.'.'.$view;
        // Grab the configuration, if they are using custom view, it will be set to true
        $config = \Config::get($package.'::views.'.$view_location);
        // Base location for custom views
        $package_folder = 'packages.sorora.'.$package.'.';
        if(!$config) // Not using custom view
        {
            // Continue as normal package view
            $package_folder = $package.'::';
        }
        return $package_folder.$view_location;
    }
}