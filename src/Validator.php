<?php

namespace Zeus\DtoAttributeValidator;

interface Validator
{
    public function isValid(mixed $value): bool;
}