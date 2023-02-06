<?php

namespace Zeus\DtoAttributeValidator;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class StringValidator implements Validator
{

    public function isValid(mixed $value): bool
    {
        return is_string($value);
    }
}