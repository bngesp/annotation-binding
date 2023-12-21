<?php

namespace Bngesp\Lombok\Test\Annotation;

use Bngesp\Lombok\Annotation\Post;

#[Post('test')]
class PostTest
{
    private string $test = 'test';

    public function getTest(): string
    {
        return $this->test;
    }
}