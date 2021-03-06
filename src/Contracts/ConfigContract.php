<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube\Contracts;

/**
 * Interface ConfigContract
 * @package Kaswell\RubicCube\Contracts
 */
interface ConfigContract
{
    /**
     * @param string|null $file_path
     * @return void
     */
    public function init(?string $file_path): void;

    /**
     * @param string $property
     * @return bool
     */
    public function __isset(string $property): bool;

    /**
     * @param string $property
     * @return mixed
     */
    public function __get(string $property): mixed;

    /**
     * @param string $property
     * @param mixed $value
     */
    public function __set(string $property, mixed $value): void;
}