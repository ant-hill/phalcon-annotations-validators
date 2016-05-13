<?php

namespace Anthill\Phalcon\AnnotationsValidator\Validators;

interface AnnotationInterface
{
    /**
     * Validator class name ( with namespace )
     * @return string
     */
    public function getName();

    /**
     * @return array
     */
    public function toArray();
}