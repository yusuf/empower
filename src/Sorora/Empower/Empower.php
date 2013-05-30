<?php namespace Sorora\Empower;

class Empower {
    /**
     * Generic Form creator for ease of creating different forms
     *
     * @return string
     */
    public function form($type, $route, $extra = array())
    {
        return $this->$type($route, $extra);
    }
    /**
     * Button generator for buttons used for @destroy actions
     *
     * @return string
     */
    public function buttonDestroy($route, $extra)
    {
        $button = $this->form('destroy', $route, $extra);
        $button .= \Form::submit('Delete');
        $button .= \Form::close();

        return $button;
    }
    /**
     * Creates a normal form (for @create resources)
     *
     * @return string
     */
    private function store($route, $extra)
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
    private function update($route, $extra)
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
    private function destroy($route, $params)
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
