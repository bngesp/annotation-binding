<?php
// first file to test with phpunit
namespace Bngesp\Lombok\Test;

use Bngesp\Lombok\Annotation\Get;
use Bngesp\Lombok\Annotation\ToString;

#[Get('test')]
#[ToString(['test'])]

class FirstTest
{
    private string $test = 'test';

    public function getTest(): string
    {
        return $this->test;
    }
}

// Path: test/FirstTest.php
// Compare this snippet from test/Annotation/GetTest.php:
// <?php
// namespace Bngesp\Lombok\Test\Annotation;
//
// use Bngesp\Lombok\Annotation\Get;
//
// #[Get('test')]
// class GetTest
// {
//     private string $test = 'test';

//     public function getTest(): string
//     {
//         return $this->test;
//     }
// }

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
