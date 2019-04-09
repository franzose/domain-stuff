<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Tests\Event\Stub;

use Franzose\DomainStuff\Event\EventPublisher;
use Franzose\DomainStuff\Event\PublishesEvents;

final class FooEntity implements EventPublisher
{
    use PublishesEvents;

    public function letBarHappen(string $qux, string $doo): void
    {
        $this->rememberThat(new BarHappened($qux, $doo));
    }

    public function letBarAndQuxHappen(string $qux, string $doo, string $arg): void
    {
        $this->rememberThat(new BarHappened($qux, $doo));
        $this->rememberThat(new QuxHappened($arg));
    }
}
