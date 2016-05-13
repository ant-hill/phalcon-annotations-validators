<?php

namespace Tests\Anthill\Phalcon\AnnotationsValidator\Validators\Fixtures;

/**
 * Class SomeAnnotatedClass
 */
class SomeAnnotatedClass
{
    /**
     * @PresenceOfValidator()
     * @StringLengthValidator(min="1",max="3")
     * @var string
     */
    private $fieldA = "some(one)@exa\mple.com";

    /**
     * @PresenceOfValidator()
     * @var string
     */
    private $fieldB;

    /**
     * @UrlValidator()
     * @var string
     */
    private $fieldC = 'http://asdasd.local' ;

    /**
     * @PresenceOfValidator()
     * @UrlValidator(message="Pew-pew")
     * @var string
     */
    private $fieldD;
}