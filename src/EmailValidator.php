<?php

namespace Zeus\DtoAttributeValidator;

use Attribute;


#[Attribute(Attribute::TARGET_PROPERTY)]
class EmailValidator implements Validator
{

    public function isValid(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}