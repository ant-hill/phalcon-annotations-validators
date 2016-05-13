<?php

namespace Anthill\Phalcon\AnnotationsValidator\Validators;

use Anthill\Phalcon\AnnotationsValidator\Validators\Exceptions\ValidatorAnnotationException;
use Phalcon\Annotations\Adapter as AnnotationAdapter;
use Phalcon\Filter;
use Phalcon\Validation;

class AnnotationValidatorManager
{

    /**
     * @var AnnotationAdapter
     */
    private $reader;

    /**
     * @var Validation
     */
    private $validator;
    /**
     * @var ValidatorBuilder
     */
    private $builder;

    /**
     * AnnotationValidatorManager constructor.
     * @param AnnotationAdapter $reader
     * @param ValidatorBuilder $builder
     */
    public function __construct(AnnotationAdapter $reader, ValidatorBuilder $builder)
    {
        $this->reader = $reader;
        $this->validator = new Validation();
        $this->builder = $builder;
    }

    /**
     * @param $class
     * @throws \Exception
     * @return \Phalcon\Validation\Message\Group
     * @throws \Anthill\Phalcon\AnnotationsValidator\Validators\Exceptions\ValidatorAnnotationException
     */
    public function validate($class)
    {
        $reader = $this->reader;

        if (gettype($class) !== 'object') {
            throw new ValidatorAnnotationException('$class must be instance of object ' . gettype($class) . ' given');
        }

        $self = $this;
        $validation = $this->validator;
        $builder = $this->builder;

        $annotator = function (\Phalcon\Annotations\Reflection $reflector) use ($self, $validation, $builder) {
            foreach ($reflector->getPropertiesAnnotations() as $name => $property) {
                foreach ($property->getAnnotations() as $annotator) {
                    $annotatorName = $annotator->getName();
                    if (!$builder->has($annotatorName)) {
                        continue;
                    }
                    $annotationClass = $builder->build($annotatorName, $annotator->getArguments());
                    $validation->add($name, $annotationClass);
                }
            }

            return $validation->validate($this);
        };

        $reflector = $reader->get(get_class($class));
        $annotator = $annotator->bindTo($class, $class);
        return $annotator($reflector);
    }
}