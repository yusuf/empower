<?php namespace Sorora\Empower;

class Empower {
    public function form($type, $route, $extra = array())
    {
        return $this->$type($route, $extra);
    }
    public function buttonDestroy($route, $extra)
    {
        $button = $this->form('destroy', $route, $extra);
        $button .= \Form::submit('Delete');
        $button .= \Form::close();

        return $button;
    }
    private function store($route, $extra)
    {
        return \Form::open(
            array(
                'route' => $route.'.store'
            )
        );
    }
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
