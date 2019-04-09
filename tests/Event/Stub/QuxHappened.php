<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Tests\Event\Stub;

use Franzose\DomainStuff\Event\Event;

final class QuxHappened implements Event
{
    public $arg;

    public function __construct(string $arg)
    {
        $this->arg = $arg;
    }
}
