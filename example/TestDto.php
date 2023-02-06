<?php


namespace Zeus\DtoAttributeValidator\Example;

use Zeus\DtoAttributeValidator\AbstractDto;
use Zeus\DtoAttributeValidator\DateValidator;
use Zeus\DtoAttributeValidator\EmailValidator;
use Zeus\DtoAttributeValidator\StringValidator;

class TestDto extends AbstractDto
{
    #[EmailValidator, StringValidator]
    public string $email;

    #[DateValidator]
    public string $date;
}