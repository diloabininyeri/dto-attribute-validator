<?php

namespace Zeus\DtoAttributeValidator;

use ReflectionAttribute;
use ReflectionException;
use ReflectionProperty;

abstract class AbstractDto
{


    /**
     * @throws ReflectionException
     * @throws ValidatorException
     */
    public function __construct(private readonly array $properties = [])
    {
        $this->setProperties($this->properties);
    }

    /**
     * @throws ValidatorException
     * @throws ReflectionException
     */
    private function setProperties(array $properties = []): void
    {
        foreach ($properties as $property => $value) {
            $this->$property = $value;
            $this->validateProperty($property, $value);
        }
    }


    /**
     * @throws ReflectionException
     * @throws ValidatorException
     */
    private function validateProperty(string $property, mixed $value): void
    {
        foreach ($this->getAttributes($property) as $attribute) {
            $this->throwIf(
                $this->newInstance($attribute)->isValid($value),
                $attribute,
                $property
            );
        }

    }

    /**
     * @throws ValidatorException
     */
    private function throwIf(bool $condition, ReflectionAttribute $attribute, string $property): void
    {
        if (!$condition) {
            $validatorException = new ValidatorException('validation error');
            $validatorException
                ->setProperty($property)
                ->setDtoClass(static::class)
                ->setValidatorClass($attribute->getName())
                ->setPropertyValue($this->$property);

            throw $validatorException;
        }
    }

    private function newInstance(ReflectionAttribute $reflectionAttribute): Validator
    {
        return $reflectionAttribute->newInstance();
    }

    /***
     * @param string $property
     * @return array<ReflectionAttribute>
     * @throws ReflectionException
     */
    private function getAttributes(string $property): array
    {
        return (new ReflectionProperty($this, $property))->getAttributes(
            Validator::class,
            ReflectionAttribute::IS_INSTANCEOF
        );
    }
}