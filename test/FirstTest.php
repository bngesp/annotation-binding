<?php

namespace Bngesp\Lombok\Test;
use PHPUnit\Framework\TestCase;
use Bngesp\Lombok\Processor\Processor;
use Bngesp\Lombok\Annotation\Get;
use Bngesp\Lombok\Annotation\ToString;

class FirstTest extends TestCase
{
    private string $test = 'test';
    private GetTest $getTest;

    public function testGetTest(): void
    {
        $this->assertEquals('test', $this->test);
    }

    public function testGet(): void
    {
        $this->getTest = new GetTest();
        $el= $this->getTest->process(GetTest::class);
        $this->assertTrue(method_exists($this->getTest, 'getNom'));
        $this->assertTrue(method_exists($this->getTest, 'getPrenom'));
        $this->assertTrue(method_exists($this->getTest, 'getAge'));

    }



}
#[Get]
#[ToString]
class GetTest
{
    use Processor;
    private String $nom;
    private String $prenom;
    private int $age;
}