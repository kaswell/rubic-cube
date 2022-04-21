<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube;

use Kaswell\RubicCube\Abstracts\AbstractConfigured;
use Kaswell\RubicCube\Contracts\ConfigContract;
use Kaswell\RubicCube\Contracts\GeneratorContract;

class Generator extends AbstractConfigured implements GeneratorContract
{
    public function init(ConfigContract $config): array
    {
        // TODO: Implement init() method.
        return [1];
    }
}