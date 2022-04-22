<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube;

use Kaswell\RubicCube\Models\Cube;
use Kaswell\RubicCube\Rotators\RotatorFactory;

/**
 * Class Rubic
 * @package Kaswell\RubicCube
 */
class Rubic
{
    /**
     * @var Config
     */
    protected Config $config;

    /**
     * @var Cube
     */
    protected Cube $cube;

    /**
     * Rubic constructor.
     */
    public function __construct(Config $config = new Config)
    {
        $this->config = $config;
        $this->cube = new Cube();
    }

    /**
     * @return Cube
     */
    public function getCube(): Cube
    {
        return $this->cube;
    }

    /**
     * @param string $type
     * @param string $route
     * @param string $direction
     * @param int $line
     * @return $this
     */
    public function rotate(string $type = 'cube', string $route = 'x', string $direction = '+', int $line = 0)
    {
        $rotator = new Rotator(new RotatorFactory(), config: $this->config, cube: $this->cube);

        $this->cube = $rotator->rotate($type, $route, $direction, $line);

        return $this;
    }

    public function __destruct()
    {

    }
}