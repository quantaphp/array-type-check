<?php

use Quanta\ArrayTypeCheck\RootFailure;
use Quanta\ArrayTypeCheck\ResultInterface;
use Quanta\ArrayTypeCheck\InvalidArrayMessage;

describe('RootFailure', function () {

    beforeEach(function () {

        $this->result = new RootFailure('invalid');

    });

    it('should implement ResultInterface', function () {

        expect($this->result)->toBeAnInstanceOf(ResultInterface::class);

    });

    describe('->isValid()', function () {

        it('should return false', function () {

            $test = $this->result->isValid();

            expect($test)->toBeFalsy();

        });

    });

    describe('->given()', function () {

        it('should return the result of gettype()', function () {

            $test = $this->result->given();

            expect($test)->toEqual('string');

        });

    });

    describe('->expected()', function () {

        it('should return \'array\'', function () {

            $test = $this->result->expected();

            expect($test)->toEqual('array');

        });

    });

    describe('->path()', function () {

        it('should return an empty array', function () {

            $test = $this->result->path();

            expect($test)->toEqual([]);

        });

    });

    describe('->sanitized()', function () {

        it('should throw a LogicException', function () {

            expect([$this->result, 'sanitized'])->toThrow(new LogicException);

        });

    });

    describe('->message()', function () {

        it('should return an InvalidArrayMessage', function () {

            $test = $this->result->message();

            expect($test)->toEqual(new InvalidArrayMessage($this->result));

        });

    });

});
