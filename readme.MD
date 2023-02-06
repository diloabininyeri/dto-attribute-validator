#### I wrote an example of how to validate a DTO using php Attribute...

>An example of how to validate a DTO

```php



<?php


use Zeus\DtoAttributeValidator\AbstractDto;
use Zeus\DtoAttributeValidator\DateValidator;
use Zeus\DtoAttributeValidator\EmailValidator;
use Zeus\DtoAttributeValidator\StringValidator;

require_once 'vendor/autoload.php';

namespace Zeus\DtoAttributeValidator\Example;



class TestDto extends AbstractDto
{
    #[EmailValidator, StringValidator]
    public string $email;

    #[DateValidator]
    public string $date;
}

class Operation
{

    public function test(estDto $testDto): void
    {
        echo $testDto->email;
    }
}

try {

    $operation = new Operation();
    $operation->test(new TestDto([
        'email' => 'berxudargmail.com',//this is not email address
        'date' => '2022-12-25',
    ]));


} catch (ValidatorException $validatorException) {

    echo $validatorException->getProperty().PHP_EOL; //email
    echo $validatorException->getDtoClass().PHP_EOL; //testDto
    echo $validatorException->getValidatorClass().PHP_EOL; //EmailValidator
    echo $validatorException->getPropertyValue().PHP_EOL; //berxudargmail.com
    
}

```