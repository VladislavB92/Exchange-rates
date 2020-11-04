<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use App\Controllers\CurrencyRateController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$controller = new CurrencyRateController();

$controller->index();

