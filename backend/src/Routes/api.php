<?php

use App\Controllers\HealthController;

/** @var \FastRoute\RouteCollector $router */

$router->addRoute('GET', '/health', [HealthController::class, 'check']);