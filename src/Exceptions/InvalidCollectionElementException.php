<?php

namespace Dockerify\Exceptions;

use InvalidArgumentException;
use Throwable;
use stdClass;

class InvalidCollectionElementException extends InvalidArgumentException
{
    const MSG_TPL = 'Only an array or \Traversable of "%s" is allowed.';

    /**
     * InvalidCollectionElementException constructor.
     *
     * @param stdClass       $obj
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($obj, $code = 0, Throwable $previous = null)
    {
        $message = sprintf(self::MSG_TPL, get_class($obj));
        parent::__construct($message, $code, $previous);
    }
}
