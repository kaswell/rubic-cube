<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Rotators;

use \Kaswell\RubicCube\Rotators\AbstractRotator as Rotator;
use Kaswell\RubicCube\Contracts\Models\CubeContract as Cube;

/**
 * Class CubeRotator
 * @package Kaswell\RubicCube\Rotator
 */
final class CubeRotator extends Rotator
{
    public function rotate(...$params): Cube
    {
        $route = 'x';
        $direction = '+';

        extract($params, EXTR_IF_EXISTS);

        return $this->cube;
    }
}