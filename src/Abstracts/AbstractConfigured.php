<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Abstracts;

use Kaswell\RubicCube\Contracts\ConfigContract;

/**
 * Class AbstractConfigured
 * @package Kaswell\RubicCube\Abstracts
 */
abstract class AbstractConfigured
{
    /**
     * @var ConfigContract
     */
    protected ConfigContract $config;

    /**
     * AbstractConfigured constructor.
     * @param ConfigContract $config
     */
    public function __construct(ConfigContract $config)
    {
        $this->config = $config;
    }
}