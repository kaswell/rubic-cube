<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Contracts\Rotator;

use Kaswell\RubicCube\Contracts\Models\CubeContract;

/**
 * Interface RotatorContract
 * @package Kaswell\RubicCube\Contracts\Rotator
 */
interface RotatorContract
{
    /**
     * @param CubeContract $cube
     */
    public function __construct(CubeContract $cube);

    /**
     * @param ...$params
     * @return CubeContract
     */
    public function rotate(...$params): CubeContract;
}