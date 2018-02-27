<?php

namespace Dockerify\Collections;

use Cake\Collection\Collection;
use Dockerify\Exceptions\InvalidCollectionElementException;
use stdClass;
use Exception;

/**
 * Class BaseCollection
 *
 * @package Dockerify\Collections
 */
abstract class BaseCollection
{
    /**
     * @var string
     */
    protected $element_class = stdClass::class;

    /**
     * @var Collection
     */
    protected $collection;

    public function __construct(array $items = [])
    {
        $this->addMany($items);
    }

    /**
     * @param object $item
     */
    public function add($item)
    {
        $this->ensureItemType($item);

        $collection = $this->getCollection()->append([$item]);
        $this->setCollection($collection);
    }

    /**
     * @param object[] $items
     */
    public function addMany(array $items)
    {
        foreach ($items as $item) {
            $this->ensureItemType($item);
        }

        $collection = $this->getCollection()->append($items);
        $this->setCollection($collection);
    }

    /**
     * @return Collection
     */
    public function getCollection()
    {
        if (!$this->collection) {
            $this->setCollection(collection([]));
        }

        return $this->collection;
    }

    /**
     * @param Collection $collection
     *
     */
    public function setCollection(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param object $item
     */
    protected function ensureItemType($item)
    {
        if (get_class($item) !== $this->element_class) {
            throw new InvalidCollectionElementException($item);
        }
    }

    public function __call($method, $arguments)
    {
        $collection = $this->getCollection();
        if (method_exists($collection, $method)) {
            return call_user_func_array([$collection, $method], $arguments);
        }
        //Fatal error: Call to undefined method Dockerify\Collections\DockerServicesCollection::first() in /app/tests/specs/Entities/DockerComposeFileSpec.php on line 14

        $bt     = debug_backtrace();
        $caller = array_shift($bt);

        $msg = sprintf(
            'Call to undefined method %s::%s() in %s on line %s',
            get_class($this),
            $method,
            $caller['file'],
            $caller['line']
        );

        throw new Exception($msg);
    }

}