<?php
// first file to test with phpunit
namespace Bngesp\Lombok\Test;
use PHPUnit\Framework\TestCase;
use Bngesp\Lombok\Processor;

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
        $processor = new Processor();
        $this->getTest = $processor->process(GetTest::class);
        $this->assertTrue(method_exists($this->getTest, 'getNom'));
        $this->assertTrue(method_exists($this->getTest, 'getPrenom'));
        $this->assertTrue(method_exists($this->getTest, 'getAge'));
        
    }



}

#[Get]
#[ToString]
class GetTest
{
    private String $nom;
    private String $prenom;
    private int $age;

}