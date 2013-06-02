<?php
    $baseurl = Config::get('empower::baseurl');
    Route::get($baseurl, array('as' => $baseurl, 'uses' => 'Sorora\\Empower\\Controllers\\PanelController@index'));
