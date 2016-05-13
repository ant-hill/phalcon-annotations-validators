<?php

return array(
    'annotations' => array(
        'className' => \Phalcon\Annotations\Adapter\Memory::class,
        'shared' => true
    ),
    'anthill.validator_builder' => array(
        'className' => \Anthill\Phalcon\AnnotationsValidator\Validators\ValidatorBuilder::class,
        'arguments' => array(
            array(
                'type' => 'config_parameter',
                'value' => 'anthill.annotations.validators.default_validators',
            )
        )
    ),
    'anthill.annotation_validator.service' => array(
        'className' => \Anthill\Phalcon\AnnotationsValidator\Validators\AnnotationValidatorManager::class,
        'arguments' => array(
            array('type' => 'service', 'name' => 'annotations'),
            array('type' => 'service', 'name' => 'anthill.validator_builder'),
        )
    ),
);