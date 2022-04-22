<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Rotators;

use Kaswell\RubicCube\Contracts\Rotator\RotatorFactoryContract;
use Kaswell\RubicCube\Contracts\Models\CubeContract as Cube;
use Kaswell\RubicCube\Contracts\Rotator\RotatorContract as Rotator;
use Kaswell\RubicCube\Exceptions\InvalidArgumentException;

/**
 * Class RotatorFactory
 * @package Kaswell\RubicCube\Rotator
 */
class RotatorFactory implements RotatorFactoryContract
{
    /**
     * @var array|string[]
     */
    private array $factories = [];

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
     * @param Cube $cube
     * @param string $type
     * @return Rotator
     * @throws InvalidArgumentException
     */
    public function create(Cube $cube, string $type): Rotator
    {
        if (!isset($this->factories[$type])){
            throw new InvalidArgumentException('Unknown rotation type');
        }

        $factory = $this->factories[$type];

        $rotator = new $factory($cube);

        return $rotator;
    }
}