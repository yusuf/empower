<?php namespace Sorora\Empower;

class Empower {
    /**
     * Helper function to access form('store', '')
     *
     * @return string
     */
    public function store($route, $view, $extra = array())
    {
        return $this->form('store', $route, $view, $extra);
    }
    /**
     * Helper function to access form('update', '')
     *
     * @return string
     */
    public function update($route, $view, $extra = array())
    {
        return $this->form('update', $route, $view, $extra);
    }
    /**
     * Generic Form creator for ease of creating different forms
     * For data from the main view to be passed here, we must
     * View::share the data from the controller
     * 
     * @return string
     */
    public function form($type, $route, $view, $extra = array())
    {
        $data = array(
            'form_type' => $type,
            'form_route' => $route,
            'form_view' => $view,
            'form_submit' => ($type == 'store') ? 'Create' : 'Edit',
            'form_extra' => $extra
        );
        return \View::make('empower::layouts.form', $data);
    }
    /**
     * Generic Form creator for ease of creating different forms
     *
     * @return string
     */
    public function open($type, $route, $extra = array())
    {
        $type .= 'Form';
        return $this->$type($route, $extra);
    }
    /**
     * Button generator for buttons used for @destroy actions
     *
     * @return string
     */
    public function buttonDestroy($route, $extra)
    {
        $button = $this->open('destroy', $route, $extra);
        $button .= \Form::submit('Delete');
        $button .= \Form::close();

        return $button;
    }
    /**
     * Creates a normal form (for @create resources)
     *
     * @return string
     */
    private function storeForm($route, $extra)
    {
        return \Form::open(
            array(
                'route' => $route.'.store'
            )
        );
    }
    /**
     * Creates a PUT form (for @update resources)
     *
     * @return string
     */
    private function updateForm($route, $extra)
    {
        return \Form::model(
            $extra['model'],
            array(
                'route' => array(
                    $route.'.update',
                    $extra['model']->id
                ),
                'method' => 'PUT'
            )
        );
    }
    /**
     * Creates a DESTROY form (for @destroy resources)
     *
     * @return string
     */
    private function destroyForm($route, $params)
    {
        return \Form::open(
            array(
                'route' => array(
                    $route.'.destroy',
                    $params
                ),
                'method' => 'DELETE'
            )
        );
    }
}
