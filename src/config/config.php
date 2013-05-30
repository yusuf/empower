<?php
return array(
    /*
    |--------------------------------------------------------------------------
    | Base URL
    |--------------------------------------------------------------------------
    |
    | When accessing the Empower control area, this is the base URL of that
    | area and any associated packages will used this too. If you would rather
    | have something like "admin", then simply change this.
    |
    */
    'baseurl' => 'sorora',

    /*
    |--------------------------------------------------------------------------
    | Database Table Prefix
    |--------------------------------------------------------------------------
    |
    | This defines the prefix to be used in front of any tables associated with
    | Empower.
    |
    */
    'dbprefix' => '',

    /*
    |--------------------------------------------------------------------------
    | External packages
    |--------------------------------------------------------------------------
    |
    | This is a list of external packages. It is required so they can be
    | included into the navigation in the main control area view.
    | Keys represent the package and the value represents the view location.
    | To add your own items to the list, add a value without a key
    | Example:
    | array(
    |   'packageName' => 'viewNavigation',
    |   'aurp' => 'layouts.nav',
    |   'customNav'
    | )
    |
    */
    'externals' => array(),

    /*
    |--------------------------------------------------------------------------
    | Parent layout for views
    |--------------------------------------------------------------------------
    |
    | A lot of packages that need Empower will have basic views associated
    | with themselves, such as a view for adding a blog post. These views
    | use an @extend at the top of the page to allow for further customisation
    | and integration into your application. Simply change this value below to
    | whatever layout you wish them to be a child of.
    |
    */
    'layout' => 'empower::layouts.master',

    /*
    |--------------------------------------------------------------------------
    | Section content goes into
    |--------------------------------------------------------------------------
    |
    | This is the @section the forms/views will be placed into in the layout
    | defined by this config's "layout"
    |
    */
    'section' => 'body'

);