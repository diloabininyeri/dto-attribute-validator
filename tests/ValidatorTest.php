<?php


use PHPUnit\Framework\TestCase;
use Zeus\DtoAttributeValidator\Example\Operation;
use Zeus\DtoAttributeValidator\Example\TestDto;
use Zeus\DtoAttributeValidator\ValidatorException;

/**
 *
 */
class ValidatorTest extends TestCase
{

    /**
     * @return void
     * @throws ReflectionException
     * @throws ValidatorException
     */
    public function testHandleExceptionValidator(): void
    {

        $this->expectException(ValidatorException::class);
        $operation = new Operation();
        $operation->test(new TestDto([
            'email' => 'berxudargmail.com' //this is not email address,missing @
        ]));

    }


    /**
     * @return void
     * @throws ReflectionException
     * @throws ValidatorException
     */
    public function testValid(): void
    {

        $operation = new Operation();
        $myEmail = 'berxudar@gmail.com';
        $email = $operation->test(new TestDto([
            'email' => $myEmail //this is email address
        ]));

        $this->assertEquals($myEmail, $email);
    }

    /**
     * @return void
     * @throws ReflectionException
     */
    public function testPropertyNameValidator(): void
    {
        try {
            $operation = new Operation();
            $email = $operation->test(new TestDto([
                'email' => 'berxudargmail.com' //this is email address
            ]));

            $this->assertEquals('berxudar@gmail.com', $email);
        } catch (ValidatorException $e) {
            $this->assertEquals('email', $e->getProperty());
        }

    }

    public function testGetPropertyValue(): void
    {
        try {
            $operation = new Operation();
            $operation->test(new TestDto([
                'email' => 'berxudargmail.com', //this is email address
                'date' => '2022-12-12',
            ]));
        } catch (ValidatorException $e) {
            $this->assertEquals('berxudargmail.com', $e->getPropertyValue());
        }

    }

    public function testHandleExceptionDateInvalid(): void
    {
        $this->expectException(ValidatorException::class);
        $operation = new Operation();
        $operation->test(new TestDto([
            'email' => 'foo@bar.com',
            'date' => 'feffwe' //this is email address
        ]));

    }

    public function testHandleExceptionDateValid(): void
    {
        $operation = new Operation();
        $operation->test(new TestDto([
            'email' => 'berxudar@gmail.com',
            'date' => '2021-12-12',
        ]));

        $this->assertTrue(true);
    }
}