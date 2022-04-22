<?php
/*
 * Copyright (c) 2022. Kaswell
 */

use Ramsey\Uuid\Uuid;

require __DIR__ . '/../vendor/autoload.php';

$rubic = new \Kaswell\RubicCube\Rubic();

print_r($rubic->rotate());