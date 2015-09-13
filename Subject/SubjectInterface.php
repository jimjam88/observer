<?php

namespace Observer\Subject;

use Observer\Observer\ObserverInterface;
use Observer\Event\EventArgs;

interface SubjectInterface
{
    /**
     * Attach an observer to a subject
     *
     * @param  ObserverInterface $observer The observer
     * @return SubjectInterface
     */
    public function attach(ObserverInterface $observer);

    /**
     * Detach an observer to a subject
     *
     * @param  ObserverInterface $observer The observer
     * @return SubjectInterface
     */
    public function detach(ObserverInterface $observer);

    /**
     * Notify the subject's observers with a set of event arguments.
     *
     * @param  EventArgs $args The event arguments
     * @return void
     */
    public function notify(EventArgs $args);
}
