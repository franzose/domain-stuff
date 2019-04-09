<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Identity;

abstract class Identifier
{
    private $value;

    protected function __construct($value)
    {
        $this->value = $value;
    }

    abstract public static function next();
    abstract public static function fromString(string $identifier);

    public function equals(Identifier $identifier): bool
    {
        return $this === $identifier || $this->value() === $identifier->value();
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value();
    }
}
