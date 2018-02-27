<?php

namespace Dockerify\Entities;

use Rakshazi\GetSetTrait;

/**
 * Class BaseKeyValueEntity
 *
 * @package Dockerify\Entities
 *
 */
abstract class BaseKeyValueEntity
{
    use GetSetTrait;

    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $value;

    abstract public function add($key, $value);
}
