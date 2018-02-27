<?php

namespace Dockerify\Entities;

use Dockerify\Collections\DockerServicesCollection;

/**
 * Class DockerComposeFile
 *
 * @package Dockerify\Entities
 **
 */
class DockerComposeFile
{
    /**
     * @var string
     */
    protected $project_name = "New Project";

    /**
     * @var int
     */
    protected $version = 2;

    /**
     * @var DockerServicesCollection
     */
    protected $services;

    public function __construct()
    {
        $services = new DockerServicesCollection();
        $this->setServices($services);
    }

    /**
     * @param DockerService $service
     *
     * @return DockerComposeFile
     */
    public function addService(DockerService $service)
    {
        $this->getServices()->add($service);

        return $this;
    }

    /**
     * @return string
     */
    public function getProjectName()
    {
        return $this->project_name;
    }

    /**
     * @param string $project_name
     *
     * @return DockerComposeFile
     */
    public function setProjectName($project_name)
    {
        $this->project_name = $project_name;

        return $this;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int $version
     *
     * @return DockerComposeFile
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return DockerServicesCollection
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param DockerServicesCollection $services
     *
     * @return DockerComposeFile
     */
    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }
}
