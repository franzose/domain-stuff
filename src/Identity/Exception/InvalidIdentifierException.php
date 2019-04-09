<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Identity\Exception;

use Exception;
use Throwable;

final class InvalidIdentifierException extends Exception
{
    private function __construct(string $message, Throwable $previous)
    {
        parent::__construct($message, 0, $previous);
    }

    public static function fromString(string $value, Throwable $previous = null): self
    {
        return new static(sprintf('Identifier "%s" is not valid.', $value), $previous);
    }
}
