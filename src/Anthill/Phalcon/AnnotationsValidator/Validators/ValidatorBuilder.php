<?php

namespace Anthill\Phalcon\AnnotationsValidator\Validators;


use Anthill\Phalcon\AnnotationsValidator\Validators\Exceptions\BuilderNotFoundException;
use Phalcon\Validation\ValidatorInterface;

class ValidatorBuilder
{
    /**
     * @var array
     */
    private $validators;

    /**
     * ValidaotrBuilder constructor.
     * @param array $validators
     */
    public function __construct(array $validators = array())
    {

        $this->validators = $validators;
    }


    public function has($name)
    {
        return array_key_exists($name, $this->validators);
    }

    /**
     * @param $name
     * @param array $options
     * @return ValidatorInterface
     * @throws \Anthill\Phalcon\AnnotationsValidator\Validators\Exceptions\BuilderNotFoundException
     */
    public function build($name, $options)
    {
        if(!$this->has($name)){
            throw new BuilderNotFoundException();
        }
        if (!$options) {
            $options = array();
        }
        $validatorClass = $this->validators[$name];
        return new $validatorClass($options);
    }

    /**
     * @param $name
     * @param $validator
     */
    public function add($name, $validator)
    {
        $this->validators[$name] = $validator;
    }
}