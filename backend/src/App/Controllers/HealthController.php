<?php

namespace App\Controllers;

use App\Http\Request;
use Monolog\Logger;

class HealthController
{
    public function __construct(private Logger $logger)
    {
    }

    public function check(Request $request)
    {
        $this->logger->info("Health check executed");

        var_dump($request);

        return json_encode(['status' => 'ok']);
    }
}
