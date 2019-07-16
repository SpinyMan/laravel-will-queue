<?php

namespace SpinyMan\WillQueue;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Bus\Queueable;

class WillQueue extends Notification implements ShouldQueue
{
    use Queueable;

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function __call($name, $arguments)
    {
        return call_user_func([$this->model, $name], $arguments[0]);
    }

    public function __get($name)
    {
        return $this->model->$name;
    }

    public function __set($name, $value)
    {
        return $this->model->$name = $value;
    }

    public function __isset($name)
    {
        return property_exists($this->model, $name);
    }
}
