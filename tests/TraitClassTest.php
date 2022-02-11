<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class TraitClassTest extends TestCase
{
    public function testConcreteMethod(): void
    {
        $mock = $this->getMockForTrait(AbstractTrait::class);

        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue(true));

        $this->assertTrue($mock->concreteMethod());
    }
}