<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class FooTest extends TestCase
{
    public function testFunctionCalledTwoTimesWithSpecificArguments(): void
    {
        $mock = $this->getMockBuilder(stdClass::class)
                     ->addMethods(['set'])
                     ->getMock();

        $mock->expects($this->exactly(2))
             ->method('set')
             ->withConsecutive(
                 [$this->equalTo('foo'), $this->greaterThan(0)],
                 [$this->equalTo('bar'), $this->greaterThan(0)]
             );

        $mock->set('foo', 21);
        $mock->set('bar', 48);
    }
    public function testIdenticalObjectPassed(): void
    {
        $expectedObject = new stdClass;

        $mock = $this->getMockBuilder(stdClass::class)
                     ->addMethods(['foo'])
                     ->getMock();

        $mock->expects($this->once())
             ->method('foo')
             ->with($this->identicalTo($expectedObject));

        $mock->foo($expectedObject);
    }
    public function testIdenticalObjectPassed2(): void
    {
        $cloneArguments = true;

        $mock = $this->getMockBuilder(stdClass::class)
                     ->enableArgumentCloning()
                     ->getMock();

        // now your mock clones parameters so the identicalTo constraint
        // will fail.

    }
}