<?php

namespace Zeus\DtoAttributeValidator\Example;

class Operation
{
    public function test(TestDto $testDto): string
    {
        return $testDto->email;
    }
}