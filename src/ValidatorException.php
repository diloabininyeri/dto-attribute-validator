<?php

namespace Zeus\DtoAttributeValidator;

use Exception;

/**
 *
 */
class ValidatorException extends Exception
{

    private mixed $propertyValue;

    /**
     * @var string
     */
    private string $property;

    /**
     * @var string
     */
    private string $dtoClass;

    /**
     * @var string
     */
    private string $validatorClass;

    /***
     * @param string $validatorClass
     * @return $this
     */
    public function setValidatorClass(string $validatorClass): self
    {
        $this->validatorClass = $validatorClass;
        return $this;
    }

    /***
     * @param string $property
     * @return $this
     */
    public function setProperty(string $property): self
    {
        $this->property = $property;
        return $this;
    }

    /***
     * @param string $dtoClass
     * @return $this
     */
    public function setDtoClass(string $dtoClass): self
    {
        $this->dtoClass = $dtoClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getProperty(): string
    {
        return $this->property;
    }

    /**
     * @return string
     */
    public function getDtoClass(): string
    {
        return $this->dtoClass;
    }

    /**
     * @return string
     */
    public function getValidatorClass(): string
    {
        return $this->validatorClass;
    }

    /**
     * @param mixed $propertyValue
     * @return ValidatorException
     */
    public function setPropertyValue(mixed $propertyValue): ValidatorException
    {
        $this->propertyValue = $propertyValue;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPropertyValue(): mixed
    {
        return $this->propertyValue;
    }

}