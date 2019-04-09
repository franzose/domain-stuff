<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Identity;

use Franzose\DomainStuff\Identity\Exception\InvalidIdentifierException;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid;

final class UuidIdentifier extends Identifier
{
    public static function next(): self
    {
        return new static(Uuid::uuid4()->toString());
    }

    public static function fromString(string $identifier): self
    {
        try {
            return new static(Uuid::fromString($identifier)->toString());
        } catch (InvalidUuidStringException $exception) {
            throw InvalidIdentifierException::fromString($identifier, $exception);
        }
    }
}
