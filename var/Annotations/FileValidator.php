<?php

/**
 * @Annotation
 */
class FileValidator
{
    public $message;
    public $allowEmpty;
    public $label;

    public $messageIniSize;
    public $messageEmpty;
    public $messageValid;
    public $maxSize;
    public $messageSize;
    public $allowedTypes = array();
    public $messageType;
    public $minResolution;
    public $messageMinResolution;
    public $maxResolution;
    public $messageMaxResolution;
}