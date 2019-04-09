<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Tests\Event\Stub;

use Franzose\DomainStuff\Event\Event;
use Franzose\DomainStuff\Event\EventListener;

final class QuxListener implements EventListener
{
    public function supports(Event $event): bool
    {
        return $event instanceof QuxHappened;
    }

    public function handle(Event $event): void
    {
        echo $event->arg;
    }
}
