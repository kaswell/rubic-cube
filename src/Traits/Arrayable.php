<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Traits;

/**
 * Trait Arrayable
 * @package Kaswell\RubicCube\Traits
 */
trait Arrayable
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

}