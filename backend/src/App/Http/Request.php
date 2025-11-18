<?php

namespace App\Http;

class Request
{
    private array $query;
    private array $body;

    public function __construct()
    {
        $this->query = $_GET;

        $rawInput = file_get_contents('php://input');
        $jsonBody = json_decode($rawInput, true);

        // Se vier JSON, usa JSON
        if (json_last_error() === JSON_ERROR_NONE && !empty($jsonBody)) {
            $this->body = $jsonBody;
        } else {
            // Caso contrário, usa $_POST (form-data ou x-www-form-urlencoded)
            $this->body = $_POST;
        }
    }

    public function input(string $key, $default = null)
    {
        return $this->body[$key] ?? $this->query[$key] ?? $default;
    }
}
