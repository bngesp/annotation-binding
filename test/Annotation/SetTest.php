<?php

namespace Bngesp\Lombok\Test\Annotation;

use Bngesp\Lombok\Annotation\Set;

#[Set('test')]
class SetTest
{
    private string $test = 'test';

    public function getTest(): string
    {
        return $this->test;
    }
}