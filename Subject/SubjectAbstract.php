<?php

namespace Observer\Subject;

use SplObjectStorage;
use BadMethodCallException;
use Observer\Observer\ObserverInterface;
use Observer\Event\EventArgs;

abstract class SubjectAbstract extends SplObjectStorage implements SubjectInterface
{
    /**
     * @{InheritDoc}
     */
    public function attach(ObserverInterface $observer)
    {
        parent::attach($observer);

        return $this;
    }

    /**
     * @{InheritDoc}
     */
    public function detach(ObserverInterface $observer)
    {
        if (!$this->contains($observer)) {
            throw new BadMethodCallException(sprintf(
                'Observer with object ID %s is not attched to the subject',
                spl_object_hash($observer)
            ));
        }

        parent::detach($observer);

        return $this;
    }

    /**
     * @{InheritDoc}
     */
    public function notify(EventArgs $args)
    {
        foreach ($this as $observer) {
            $observer->notify($args);
        }
    }
}
