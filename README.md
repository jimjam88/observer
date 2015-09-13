# Observer

Very simple observer pattern for PHP with C# like event arguments.

## Usage

Create a subject by extending the `Observer\Subject\SubjectAbstract` or by implementing the `Observer\Subject\SubjectInterface`...

```php
use Observer\Subject\SubjectAbstract;

class Subject extends SubjectAbstract
{

}
```

Create an event that will be published to the observers. All event args **must** extend `Observer\Event\EventArgs`

```php
use Observer\Event\CallbackEventArgs;

class Event extends CallbackEventArgs
{
    /**
     * Some event args info
     *
     * @var string
     */
    protected $info;

    /**
     * Gets the value of info.
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Sets the value of info.
     *
     * @param  string $info the info
     * @return self
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }
}
```

Now create some observers. Observers must implement the `Observer\Observer\ObserverInterface`

```php
use Observer\Observer\ObserverInterface;

class ObserverA implements ObserverInterface
{
    public function notify(EventArgs $args)
    {
        var_dump(__CLASS__);

        var_dump($args->getInfo());

        call_user_func($args->getCallback());
    }
}

class ObserverB implements ObserverInterface
{
    public function notify(EventArgs $args)
    {
        var_dump(__CLASS__);

        var_dump($args->getInfo());

        call_user_func($args->getCallback());
    }
}
```

Now tie it altogether...

```php
// Instantiate the subject
$subject = new Subject();

// ...and attach the observers
$subject->attach(new ObserverA());
$subject->attach(new ObserverB());

// Create an event
$event = new Event();
$event->setInfo('Hello, World!');
$event->setCallback(function() {
    var_dump('Hello, callback!');
});

// Notify the observers of the event
$subject->notify($event);
```

The above will output:

```bash
string(9) "ObserverA"
string(13) "Hello, World!"
string(16) "Hello, callback!"
string(9) "ObserverB"
string(13) "Hello, World!"
string(16) "Hello, callback!"
```
