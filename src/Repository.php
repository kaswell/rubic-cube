<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube;

use Kaswell\RubicCube\Abstracts\AbstractConfigured;
use Kaswell\RubicCube\Contracts\ConfigContract;
use Kaswell\RubicCube\Models\Cube;

class Repository extends AbstractConfigured
{
    /**
     * Repository constructor.
     * @param ConfigContract $config
     */
    public function __construct(ConfigContract $config)
    {
        parent::__construct($config);
    }

    /**
     * @return Cube
     */
    public function getCube(): Cube
    {
        $cube = new Cube($this->config);

        $generator = new Generator($this->config);

        $cube->setFacets($generator->init($this->config));

        return $cube;
    }

    public function putCube(Cube $cube): void
    {
        return;
    }
}