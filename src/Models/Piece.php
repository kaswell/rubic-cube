<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Models;


use Kaswell\RubicCube\Traits\Arrayable;
use Ramsey\Uuid\Uuid;

class Piece
{
    use Arrayable;

    /**
     * @var string|\Ramsey\Uuid\UuidInterface
     */
    protected string $uuid;
    protected $position;

    public function __construct()
    {
        $this->uuid = Uuid::uuid4();
    }
}