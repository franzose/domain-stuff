<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Tests\Event\Test;

use Franzose\DomainStuff\Event\Test\AssertsEventsWerePublished;
use Franzose\DomainStuff\Tests\Event\Stub\BarHappened;
use Franzose\DomainStuff\Tests\Event\Stub\FooEntity;
use Franzose\DomainStuff\Tests\Event\Stub\QuxHappened;
use PHPUnit\Framework\TestCase;

final class AssertsEventsWerePublishedTraitTest extends TestCase
{
    use AssertsEventsWerePublished;

    public function testAssertEventWasPublishedWorks(): void
    {
        $foo = new FooEntity();
        $foo->letBarHappen('aloha', 'ahola');

        static::assertEventWasPublished(
            $foo,
            BarHappened::class,
            static function (BarHappened $event): void {
                static::assertEquals('aloha', $event->qux);
                static::assertEquals('ahola', $event->doo);
            });
    }

    public function testAssertEventsWerePublishedWorks(): void
    {
        $foo = new FooEntity();
        $foo->letBarAndQuxHappen('aloha', 'ahola', 'arg');

        static::assertEventsWerePublished(
            $foo,
            [BarHappened::class, QuxHappened::class],
            static function (BarHappened $barHappened, QuxHappened $quxHappened): void {
                static::assertEquals('aloha', $barHappened->qux);
                static::assertEquals('ahola', $barHappened->doo);
                static::assertEquals('arg', $quxHappened->arg);
            });
    }
}
