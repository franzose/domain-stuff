<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Tests\Event\Stub;

use Franzose\DomainStuff\Event\Event;
use Franzose\DomainStuff\Event\EventListener;

final class BarListener implements EventListener
{
    public function supports(Event $event): bool
    {
        return $event instanceof BarHappened;
    }

    /**
     * @param Event|BarHappened $event
     */
    public function handle(Event $event): void
    {
        printf('%s %s', $event->qux, $event->doo);
    }
}
