<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube;

use Kaswell\RubicCube\Contracts\ConfigContract;
use Kaswell\RubicCube\Contracts\Models\CubeContract;
use Kaswell\RubicCube\Contracts\Rotator\RotatorFactoryContract;

class Rotator
{
    /**
     * @var RotatorFactoryContract
     */
    protected RotatorFactoryContract $rotator_factory;

    /**
     * @var CubeContract
     */
    protected CubeContract $cube;

    /**
     * @var array
     */
    protected array $rotators = [];

    /**
     * @param RotatorFactoryContract $rotator_factory
     * @param ConfigContract $config
     * @param CubeContract $cube
     */
    public function __construct(RotatorFactoryContract $rotator_factory, ConfigContract $config, CubeContract $cube)
    {
        $this->rotator_factory = $rotator_factory;
        $this->cube = $cube;
        $this->rotators = $config->rotators;

        $this->init();
    }

    /**
     * @return void
     */
    protected function init(): void
    {
        if (is_array($this->rotators) && !empty($this->rotators)) {
            foreach ($this->rotators as $type => $class) {
                $this->rotator_factory->addRotatorFactory($type, $class);
            }
        }
    }

    /**
     * @param string $type
     * @param string $route
     * @param string $direction
     * @param int $line
     * @return CubeContract
     */
    public function rotate(string $type, string $route, string $direction, int $line)
    {
        $rotator = $this->rotator_factory->create($this->cube, $type);

        return $rotator->rotate(route: $route, direction: $direction, line: $line);
    }
}