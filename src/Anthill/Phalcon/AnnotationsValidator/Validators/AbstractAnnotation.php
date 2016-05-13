<?php

namespace Anthill\Phalcon\AnnotationsValidator\Validators;

abstract class AbstractAnnotation implements AnnotationInterface
{
    public $message;

    public $options = array();

    /**
     * constructor.
     * @param array $options
     */
    public function __construct($options = array())
    {
        if (!$options) {
            $options = array();
        }
        $this->options = $options;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return $this->options;
    }
}