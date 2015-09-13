<?php

namespace Observer\Event;

class CallbackEventArgs extends EventArgs
{
    /**
     * A callback
     *
     * @var Callable
     */
    protected $callback;

    /**
     * Gets the callback.
     *
     * @return Callable
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * Sets the callback.
     *
     * @param  Callable $callback the callback
     * @return self
     */
    public function setCallback(Callable $callback)
    {
        $this->callback = $callback;

        return $this;
    }
}
