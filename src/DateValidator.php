<?php

namespace Zeus\DtoAttributeValidator;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class DateValidator implements Validator
{

    public function isValid(mixed $value): bool
    {
        return (bool)strtotime($value);
    }
}
