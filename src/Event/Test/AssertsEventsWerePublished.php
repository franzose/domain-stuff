<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Event\Test;

use Franzose\DomainStuff\Event\Event;
use Franzose\DomainStuff\Event\EventPublisher;

trait AssertsEventsWerePublished
{
    public static function assertEventWasPublished(
        EventPublisher $publisher,
        string $event,
        callable $assert = null
    ): void {
        $released = $publisher->releaseEvents();

        $events = array_filter($released, function (Event $e) use ($event) {
            return $e instanceof $event;
        });

        static::assertCount(1, $events);

        if (is_callable($assert)) {
            $assert(reset($events));
        }
    }

    public static function assertEventsWerePublished(
        EventPublisher $publisher,
        array $events,
        callable $assert = null
    ): void {
        $released = $publisher->releaseEvents();

        static::assertCount(count($events), $released);

        $classNames = array_map(function (Event $event) {
            return get_class($event);
        }, $released);

        foreach ($classNames as $class) {
            static::assertContains($class, $events);
        }

        if (is_callable($assert)) {
            $assert(...array_values($released));
        }
    }
}
