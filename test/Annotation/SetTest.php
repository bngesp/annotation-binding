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

    public function setTest(string $test): void
    {
        $this->test = $test;
    }

    public function test(): void
    {
        $this->setTest('test');
    }
}

// Path: test/Annotation/ToStringTest.php

// Compare this snippet from test/Annotation/ToStringTest.php:
// <?php
// namespace Bngesp\Lombok\Test\Annotation;
// 
// use Bngesp\Lombok\Annotation\ToString;
//
// #[ToString(['test'])]
// class ToStringTest
// {
//     private string $test = 'test';
// }
