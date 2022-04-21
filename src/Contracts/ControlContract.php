<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Contracts;

/**
 * Interface RotatorContract
 * @package Kaswell\RubicCube\Contracts
 */
interface ControlContract
{
    /**
     * @param string $route
     * @param string $direction
     */
    public function rotateCube(string $route, string $direction);

    /**
     * @param string $facet
     * @param int $line
     * @param string $direction
     */
    public function rotate(string $facet, int $line, string $direction);
}