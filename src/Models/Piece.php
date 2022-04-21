<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Models;


use Ramsey\Uuid\Uuid;

class Piece
{
    protected $uuid;

    public function __construct()
    {
        $this->uuid = Uuid::uuid4();
    }
}