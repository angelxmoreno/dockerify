<?php

use Dockerify\Exceptions\InvalidCollectionElementException;

describe(InvalidCollectionElementException::class, function () {
    it('is an instance of \Exception', function () {
        expect(new InvalidCollectionElementException(new \stdClass()))
            ->toBeAnInstanceOf(\Exception::class);
    });

    it('builds an exception message from the object', function () {
        $obj = new \stdClass();
        $e   = new InvalidCollectionElementException($obj);

        $actual = $e->getMessage();
        $expected = sprintf(InvalidCollectionElementException::MSG_TPL, get_class($obj));

        expect($actual)
            ->toBe($expected);
    });
});
