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
    'base_url' => 'sorora/',

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