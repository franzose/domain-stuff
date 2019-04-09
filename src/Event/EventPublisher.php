<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Event;

interface EventPublisher
{
    /**
     * @return array|Event[]
     */
    public function releaseEvents(): array;
}
