<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube;

use Kaswell\RubicCube\Contracts\ConfigContract as Config;
use Kaswell\RubicCube\Contracts\Models\CubeContract as Cube;
use Kaswell\RubicCube\Contracts\Rotator\RotatorFactoryContract as RotatorFactory;
use Kaswell\RubicCube\Rotators\AbstractRotator;

class Rotator
{
    /**
     * @var RotatorFactory
     */
    protected RotatorFactory $rotator_factory;

    /**
     * @var Cube
     */
    protected Cube $cube;

    /**
     * @var array|string[]
     */
    protected array $rotators = [];

    /**
     * @param RotatorFactory $rotator_factory
     * @param Config $config
     * @param Cube $cube
     */
    public function __construct(RotatorFactory $rotator_factory, Config $config, Cube $cube)
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
     * @return Cube
     */
    public function rotate(string $type, string $route, string $direction, int $line): Cube
    {
        $rotator = $this->rotator_factory->create($this->cube, $type);

        return $rotator->rotate(route: $route, direction: $direction, line: $line);
    }
}