<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Contracts\Rotator;

use Kaswell\RubicCube\Contracts\Models\CubeContract as Cube;

/**
 * Interface RotatorContract
 * @package Kaswell\RubicCube\Contracts\Rotator
 */
interface RotatorContract
{
    /**
     * @param Cube $cube
     */
    public function __construct(Cube $cube);

    /**
     * @param ...$params
     * @return Cube
     */
    public function rotate(...$params): Cube;
}