<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Tests\Event;

use Franzose\DomainStuff\Event\EventDispatcher;
use Franzose\DomainStuff\Tests\Event\Stub\BarListener;
use Franzose\DomainStuff\Tests\Event\Stub\FooEntity;
use Franzose\DomainStuff\Tests\Event\Stub\QuxListener;
use PHPUnit\Framework\TestCase;

final class EventDispatcherTest extends TestCase
{
    public function testDispatch(): void
    {
        $foo = new FooEntity();
        $foo->letBarHappen('qux', 'doo');

        $dispatcher = new EventDispatcher([
            new QuxListener(),
            new BarListener()
        ]);

        ob_start();

        $dispatcher->dispatch($foo->releaseEvents());

        $content = ob_get_clean();

        static::assertEquals('qux doo', $content);
    }
}
