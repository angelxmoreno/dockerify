<?php

namespace Dockerify\Entities;

use Dockerify\Collections\DockerServicesCollection;
use Dockerify\Collections\EnvironmentsCollection;
use Dockerify\Collections\PortsCollection;
use Dockerify\Collections\VolumesCollection;

/**
 * Class DockerService
 *
 * @package Dockerify\Entities
 */
class DockerService
{
    /**
     * @var string
     */
    protected $container_name;

    /**
     * @var string
     */
    protected $image;

    /**
     * @var bool
     */
    protected $restart = false;

    /**
     * @var VolumesCollection
     */
    protected $volumes;

    /**
     * @var DockerServicesCollection
     */
    protected $links ;

    /**
     * @var string
     */
    protected $command;

    /**
     * @var EnvironmentsCollection
     */
    protected $environment = false;

    /**
     * @var PortsCollection
     */
    protected $ports;

    /**
     * @var DockerServicesCollection
     */
    protected $volumes_from;
}
