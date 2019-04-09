<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Event;

interface EventListener
{
    public function supports(Event $event): bool;
    public function handle(Event $event): void;
}
