<?php

namespace Dockerify\Collections;

use Dockerify\Entities\Port;

/**
 * Class PortsCollection
 *
 * @package Dockerify\Collections
 */
class PortsCollection extends BaseCollection
{
    protected $element_class = Port::class;
}
