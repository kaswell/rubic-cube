<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube;

use Kaswell\RubicCube\Contracts\ControlContract;
use Kaswell\RubicCube\Contracts\RubicContract;
use Kaswell\RubicCube\Models\Cube;

/**
 * Class Rubic
 * @package Kaswell\RubicCube
 */
class Rubic implements RubicContract, ControlContract
{
    /**
     * @var Config
     */
    protected Config $config;

    /**
     * @var Repository
     */
    protected Repository $repository;

    /**
     * @var Cube
     */
    protected Cube $cube;

    /**
     * Rubic constructor.
     */
    public function __construct(?string $config_file_path = null)
    {
        $this->config = new Config($config_file_path);

        $this->repository = new Repository($this->config);

        $this->cube = $this->repository->getCube();
    }

    /**
     * @return array
     */
    public function getCube(): array
    {
        return $this->repository->getCube()->getFacets();
    }

    /**
     * @param string $route
     * @param string $direction
     * @return array
     */
    public function rotateCube(string $route, string $direction): array
    {
        return $this->cube->getFacets();
    }


    public function rotate(string $facet, int $line, string $direction): array
    {
        $rotator = new Control($this->cube);

        $this->cube = $rotator->rotate($facet, $line, $direction);

        return $this->cube->getFacets();
    }


}