<?php

namespace Dockerify\Collections;

use Dockerify\Entities\DockerService;

/**
 * Class DockerServicesCollection
 *
 * @package Dockerify\Collections
 */
class DockerServicesCollection extends BaseCollection
{
    protected $element_class = DockerService::class;
}
