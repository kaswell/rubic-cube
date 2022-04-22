<?php
/*
 * Copyright (c) 2022. Kaswell
 */

namespace Kaswell\RubicCube;

use Kaswell\RubicCube\Contracts\ConfigContract;
use Kaswell\RubicCube\Exceptions\ConfigException;

class Config implements ConfigContract
{
    /**
     * @const array
     */
    protected const REQUIRED_PARAMS = ['width','height'];

    /**
     * @var array
     */
    protected array $config = [];

    /**
     * Config constructor.
     */
    public function __construct(?string $file_path = null)
    {
        $this->init($file_path);
    }

    /**
     * @param string|null $file_path
     * @return void
     * @throws ConfigException
     */
    public function init(?string $file_path = null): void
    {
        if ($file_path === null) {
            $this->config = require_once __DIR__ . '/../config/rubic-cube.php';
        } elseif (file_exists($file_path)) {
            $this->config = require_once $file_path;
        }
        $this->validate();
    }

    /**
     * @throws ConfigException
     */
    protected function validate(): void
    {
        if (!empty(array_diff(self::REQUIRED_PARAMS, array_keys($this->config)))){
            throw new ConfigException('Required params not found.');
        }
    }

    /**
     * @param string $property
     * @return bool
     */
    public function __isset(string $property): bool
    {
        $property = mb_strtolower($property);

        return property_exists($this, 'config') && isset($this->config[$property]);
    }

    /**
     * @param string $property
     * @return mixed
     */
    public function __get(string $property): mixed
    {
        $property = mb_strtolower($property);

        if (array_key_exists($property, $this->config)) {
            return $this->config[$property];
        }

        return null;
    }

    /**
     * @param string $property
     * @param mixed $value
     */
    public function __set(string $property, mixed $value): void
    {
        $this->config[mb_strtolower($property)] = $value;
    }
}