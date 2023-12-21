<?php
namespace Bngesp\Lombok\Test\Annotation;

use Bngesp\Lombok\Annotation\Get;

#[Get('test')]
class GetTest
{
    private string $test = 'test';

    public function getTest(): string
    {
        return $this->test;
    }
}