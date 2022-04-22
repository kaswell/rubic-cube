<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Models;

use Kaswell\RubicCube\Contracts\Models\CubeContract;
use Kaswell\RubicCube\Exceptions\ValidateException;

/**
 * Class Cube
 * @package Kaswell\RubicCube\Models
 */
class Cube implements CubeContract
{
    /**
     * @var array
     */
    protected array $facets = [];

    /**
     * @param array $facets
     * @return bool
     */
    protected function validate(array $facets): bool
    {
        if (empty($facets)) return false;

        return true;
    }

    /**
     * @param array $facets
     * @return void
     * @throws ValidateException
     */
    public function setFacets(array $facets): void
    {
        if (!$this->validate($facets)){
            throw new ValidateException('Wrong facets.');
        }
        $this->facets = $facets;
    }

    /**
     * @return array
     */
    public function getFacets(): array
    {
        return $this->facets;
    }

    /**
     * @return int[]
     */
    public function getSize(): array
    {
        return [3, 3];
    }
}