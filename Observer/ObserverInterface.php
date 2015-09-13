<?php

namespace Observer\Observer;

use Observer\Event\EventArgs;

interface ObserverInterface
{
    /**
     * Notify an observer with event arguments.
     *
     * @param  EventArgs $args The args
     * @return void
     */
    public function notify(EventArgs $args);
}
