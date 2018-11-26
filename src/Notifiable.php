<?php

namespace SpinyMan\WillQueue;

use Illuminate\Contracts\Queue\ShouldQueue;

trait Notifiable
{
    use \Illuminate\Notifications\Notifiable {notify as doNotify;}

    /**
     * Queue will be used if second param exists and it's true,
     *
     * @inheritdoc
     */
    public function notify($instance)
    {
        $params = func_get_args();
        $shouldQueue = isset($params[1]) ? $params[1] : false;
        if ($shouldQueue && ! $instance instanceof ShouldQueue) {
            $instance = new WillQueue($instance);
        }

        self::doNotify($instance);
    }

    /**
     * Force use queue for notify
     *
     * @param $instance
     */
    public function notifyFromQueue($instance)
    {
        if (! $instance instanceof ShouldQueue) {
            $instance = new WillQueue($instance);
        }

        self::doNotify($instance);
    }
}