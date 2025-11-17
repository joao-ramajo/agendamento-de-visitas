<?php

use App\Controllers\HealthController;

$router->addRoute('GET', '/health', [HealthController::class, 'check']);