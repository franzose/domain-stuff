<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Event;

trait PublishesEvents
{
    private $domainEvents = [];

    /**
     * @return array|Event[]
     */
    public function releaseEvents(): array
    {
        [$released, $this->domainEvents] = [$this->domainEvents, []];

        return $released;
    }

    private function rememberThat(Event $event): void
    {
        $this->domainEvents[] = $event;
    }
}
