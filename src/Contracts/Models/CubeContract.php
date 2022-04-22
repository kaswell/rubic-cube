<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Contracts\Models;

interface CubeContract
{
    /**
     * @param array $facets
     * @return void
     */
    public function setFacets(array $facets): void;

    /**
     * @return array
     */
    public function getFacets(): array;

    /**
     * @return array
     */
    public function getSize(): array;
}