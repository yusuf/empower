<?php namespace Sorora\Empower;

class Empower {
    public function form($type, $route, $extra = array())
    {
        return $this->$type($route, $extra);
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
                    $route.'.store',
                    $extra['model']->id
                )
            )
        );
    }
}
