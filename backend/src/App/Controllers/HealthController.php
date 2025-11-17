<?php

namespace App\Controllers;

use Monolog\Logger;

class HealthController
{
    public function __construct(private Logger $logger)
    {
    }

    public function check()
    {
        $this->logger->info("Health check executed");

        return json_encode(['status' => 'ok']);
    }
}
