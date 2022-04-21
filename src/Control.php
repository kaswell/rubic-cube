<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube;

use Kaswell\RubicCube\Contracts\ControlContract;
use Kaswell\RubicCube\Exceptions\ValidateException;
use Kaswell\RubicCube\Models\Cube;

class Control implements ControlContract
{
    /**
     * @var Cube
     */
    protected Cube $cube;

    /**
     * Rotator constructor.
     * @param Cube $cube
     */
    public function __construct(Cube $cube)
    {
        $this->cube = $cube;
    }

    public function rotate(string $facet, int $line, string $direction): Cube
    {
        if (in_array($facet, ['x','y','z'])){
            throw new ValidateException('Invalid facet');
        }

        $this->cube->setFacets([
            'new'
        ]);

        return $this->cube;
    }

    public function rotateCube(string $route, string $direction): Cube
    {

    }

    public function checkIsSolved()
    {
        $solved = true;
        const SIDES = ['x-'=>[], 'x+'=>[], 'y-'=>[], 'y+'=>[], 'z-'=>[], 'z+'=>[]];
    }
}