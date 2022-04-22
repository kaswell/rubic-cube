<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Contracts\Rotator;

use Kaswell\RubicCube\Contracts\Models\CubeContract;

/**
 * Interface RotatorFactory
 * @package Kaswell\RubicCube\Contracts\Rotator
 */
interface RotatorFactoryContract
{
    /**
     * @param string $type
     * @param string $factory
     * @return void
     */
    public function addRotatorFactory(string $type, string $factory): void;

    /**
     * @param CubeContract $cube
     * @param string $type
     * @return RotatorContract
     */
    public function create(CubeContract $cube, string $type): RotatorContract;
}