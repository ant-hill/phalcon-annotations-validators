<?php

namespace Tests\Anthill\Phalcon\AnnotationsValidator\Validators;

use Anthill\Phalcon\AnnotationsValidator\Validators\AnnotationValidatorManager;
use Anthill\Phalcon\AnnotationsValidator\Validators\ValidatorBuilder;
use Phalcon\Annotations\Adapter\Memory as MemoryAnnotator;
use Phalcon\Validation;
use Tests\Anthill\Phalcon\AnnotationsValidator\Validators\Fixtures\AppKernelFixture;
use Tests\Anthill\Phalcon\AnnotationsValidator\Validators\Fixtures\SomeAnnotatedClass;

class AnnotationsValidatorManagerTest extends \PHPUnit_Framework_TestCase
{

    public function testValidator()
    {
        $filteredClass = new SomeAnnotatedClass();

        $config = include __DIR__ . '/Fixtures/config.php';
        $annotator = new AnnotationValidatorManager(new MemoryAnnotator(), new ValidatorBuilder($config));
        $messages = $annotator->validate($filteredClass);

        $this->assertFalse($messages->valid());
        $this->assertEquals($messages->offsetGet(0)->getField(), 'fieldA');
        $this->assertEquals($messages->offsetGet(0)->getType(), 'TooLong');

        $this->assertEquals($messages->offsetGet(1)->getField(), 'fieldB');
        $this->assertEquals($messages->offsetGet(1)->getType(), 'PresenceOf');

        $this->assertEquals($messages->offsetGet(2)->getField(), 'fieldD');
        $this->assertEquals($messages->offsetGet(2)->getType(), 'PresenceOf');

        $this->assertEquals($messages->offsetGet(3)->getField(), 'fieldD');
        $this->assertEquals($messages->offsetGet(3)->getType(), 'Url');
        $this->assertEquals($messages->offsetGet(3)->getMessage(), 'Pew-pew');

    }
    public function testModuleBuildSuccesfulyAndAvailableFromDI()
    {
        $kernel = new AppKernelFixture('xxx');
        $kernel->boot();
        $di = $kernel->getDI();
        $validationManager = $di->get('anthill.annotation_validator.service');
        $this->assertInstanceOf(\Anthill\Phalcon\AnnotationsValidator\Validators\AnnotationValidatorManager::class, $validationManager);
    }
}