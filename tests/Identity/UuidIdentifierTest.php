<?php
declare(strict_types=1);

namespace Franzose\DomainStuff\Tests\Identity;

use Franzose\DomainStuff\Identity\Exception\InvalidIdentifierException;
use Franzose\DomainStuff\Identity\UuidIdentifier;
use PHPUnit\Framework\TestCase;

final class UuidIdentifierTest extends TestCase
{
    public function testEquals(): void
    {
        $id1 = UuidIdentifier::fromString('22014976-8566-43c7-a1a3-ae04a6cb8a4d');
        $id2 = UuidIdentifier::fromString('22014976-8566-43c7-a1a3-ae04a6cb8a4d');

        static::assertTrue($id1->equals($id2));
        static::assertTrue($id2->equals($id1));
    }

    public function testFromStringShouldThrowCustomException(): void
    {
        $this->expectException(InvalidIdentifierException::class);

        UuidIdentifier::fromString('foo');
    }
}
