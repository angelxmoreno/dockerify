<?php

namespace Dockerify\Collections;

use Dockerify\Entities\Volume;

/**
 * Class VolumesCollection
 *
 * @package Dockerify\Collections
 */
class VolumesCollection extends BaseCollection
{
    protected $element_class = Volume::class;
}
