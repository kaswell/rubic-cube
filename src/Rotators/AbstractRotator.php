<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Rotators;

use Kaswell\RubicCube\Contracts\Models\CubeContract as Cube;
use Kaswell\RubicCube\Contracts\Rotator\RotatorContract;

abstract class AbstractRotator implements RotatorContract
{
    /**
     * @var Cube
     */
    protected Cube $cube;

    /**
     * @param Cube $cube
     */
    public function __construct(Cube $cube)
    {
        $this->cube = $cube;
    }

    abstract public function rotate(...$params): Cube;
}