<?php

namespace Dockerify\Collections;

use Dockerify\Entities\Environment;

/**
 * Class EnvironmentsCollection
 *
 * @package Dockerify\Collections
 */
class EnvironmentsCollection extends BaseCollection
{
    protected $element_class = Environment::class;
}
