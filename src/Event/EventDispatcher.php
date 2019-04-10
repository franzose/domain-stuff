<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Event;

class EventDispatcher
{
    /**
     * @var array|EventListener[]
     */
    private $listeners = [];

    public function __construct(iterable $listeners = [])
    {
        foreach ($listeners as $listener) {
            $this->addListener($listener);
        }
    }

    public function dispatch(iterable $events): void
    {
        foreach ($events as $event) {
            foreach ($this->listeners as $listener) {
                if ($listener->supports($event)) {
                    $listener->handle($event);
                }
            }
        }
    }

    public function addListener(EventListener $listener): void
    {
        $this->listeners[] = $listener;
    }

    public function removeListener(EventListener $listener): void
    {
        $index = array_search($listener, $this->listeners, true);

        if (false === $index) {
            return;
        }

        array_splice($this->listeners, $index, 1);
    }
}
