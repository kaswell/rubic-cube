<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Rotators;

use Kaswell\RubicCube\Contracts\Models\CubeContract;
use Kaswell\RubicCube\Contracts\Rotator\RotatorContract;
use Kaswell\RubicCube\Contracts\Rotator\RotatorFactoryContract;
use Kaswell\RubicCube\Exceptions\InvalidArgumentException;

/**
 * Class RotatorFactory
 * @package Kaswell\RubicCube\Rotator
 */
class RotatorFactory implements RotatorFactoryContract
{
    private $factories = [];

    /**
     * @param string $type
     * @param string $factory
     * @return void
     */
    public function addRotatorFactory(string $type, string $factory): void
    {
        if (class_exists($factory)) {
            $this->factories[$type] = $factory;
        }
    }

    /**
     * @param CubeContract $cube
     * @param string $type
     * @return RotatorContract
     * @throws InvalidArgumentException
     */
    public function create(CubeContract $cube, string $type): RotatorContract
    {
        if (!isset($this->factories[$type])){
            throw new InvalidArgumentException('Unknown rotation type');
        }

        $factory = $this->factories[$type];

        $rotator = new $factory($cube);

        return $rotator;
    }
}