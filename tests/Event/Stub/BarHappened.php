<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Tests\Event\Stub;

use Franzose\DomainStuff\Event\Event;

final class BarHappened implements Event
{
    public $qux;
    public $doo;

    public function __construct(string $qux, string $doo)
    {
        $this->qux = $qux;
        $this->doo = $doo;
    }
}
