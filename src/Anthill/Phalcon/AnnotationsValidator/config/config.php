<?php

return [
    'anthill' => [
        'annotations' => [
            'validators' => [
                'default_validators' => [
                    'AlnumValidator' => '\\Phalcon\\Validation\\Validator\\Alnum',
                    'AlphaValidator' => '\\Phalcon\\Validation\\Validator\\Alpha',
                    'BetweenValidator' => '\\Phalcon\\Validation\\Validator\\Between',
                    'ConfirmationValidator' => '\\Phalcon\\Validation\\Validator\\Confirmation',
                    'CreditCardValidator' => '\\Phalcon\\Validation\\Validator\\CreditCard',
                    'DigitValidator' => '\\Phalcon\\Validation\\Validator\\Digit',
                    'EmailValidator' => '\\Phalcon\\Validation\\Validator\\Email',
                    'ExclusionInValidator' => '\\Phalcon\\Validation\\Validator\\ExclusionIn',
                    'FileValidator' => '\\Phalcon\\Validation\\Validator\\File',
                    'IdenticalValidator' => '\\Phalcon\\Validation\\Validator\\Identical',
                    'InclusionInValidator' => '\\Phalcon\\Validation\\Validator\\InclusionIn',
                    'NumericalityValidator' => '\\Phalcon\\Validation\\Validator\\Numericality',
                    'PresenceOfValidator' => '\\Phalcon\\Validation\\Validator\\PresenceOf',
                    'RegexValidator' => '\\Phalcon\\Validation\\Validator\\Regex',
                    'StringLengthValidator' => '\\Phalcon\\Validation\\Validator\\StringLength',
                    'UniquenessValidator' => '\\Phalcon\\Validation\\Validator\\Uniqueness',
                    'UrlValidator' => '\\Phalcon\\Validation\\Validator\\Url'
                ]
            ]
        ]
    ]
];