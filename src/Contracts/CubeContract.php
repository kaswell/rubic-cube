<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Contracts;

interface CubeContract
{
    /**
     * @param array $facets
     * @return $this
     */
    public function setFacets(array $facets): self;

    /**
     * @return array
     */
    public function getFacets(): array;
}