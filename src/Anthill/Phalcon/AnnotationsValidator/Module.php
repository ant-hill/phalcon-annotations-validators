<?php

namespace Anthill\Phalcon\AnnotationsValidator;


use Anthill\Phalcon\KernelModule\ConfigLoader\LoaderFactoryInterface;
use Anthill\Phalcon\KernelModule\Module\AbstractModule;
use Phalcon\Config;

class Module extends AbstractModule
{

    /**
     * Get config path
     * @return string
     */
    public function getModuleName()
    {
        return 'anthill_annotation_validator';
    }

    /**
     * Get config path
     * @param LoaderFactoryInterface $loader
     * @return Config|null
     * @throws \Anthill\Phalcon\KernelModule\ConfigLoader\Exceptions\LoaderException
     */
    public function getConfig(LoaderFactoryInterface $loader)
    {
        return $loader->load(__DIR__ . '/config/config.php');
    }

    /**
     * @param LoaderFactoryInterface $loader
     * @return Config|null
     * @throws \Anthill\Phalcon\KernelModule\ConfigLoader\Exceptions\LoaderException
     */
    public function getServicesConfig(LoaderFactoryInterface $loader)
    {
        return $loader->load(__DIR__ . '/config/services.php');
    }
}