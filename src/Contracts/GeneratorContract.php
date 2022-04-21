<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Contracts;

interface GeneratorContract
{
    public function init(ConfigContract $config): array;
}