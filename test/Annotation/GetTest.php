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
