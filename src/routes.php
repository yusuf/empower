<?php
    $baseurl = Config::get('empower::baseurl');
    Route::get($baseurl, array('before' => 'auth', 'as' => $baseurl, 'uses' => 'Sorora\\Empower\\Controllers\\PanelController@index'));
