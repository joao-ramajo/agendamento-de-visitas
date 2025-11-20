<?php

require_once dirname(__DIR__, 1) . '/vendor/autoload.php';

use DI\ContainerBuilder;
use Dotenv\Dotenv;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$allowedOrigin = 'https://loop-teste-tecnico.vercel.app';
$origin = $_SERVER['HTTP_ORIGIN'] ?? null;
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

$isPostman = str_contains($userAgent, 'PostmanRuntime');

if ($origin === $allowedOrigin || $isPostman) {
    header("Access-Control-Allow-Origin: $allowedOrigin");  // nunca use *
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, Accept');
} else {
    header('HTTP/1.1 403 Forbidden');
    echo json_encode(['error' => 'Acesso não autorizado']);
    exit;
}

date_default_timezone_set('America/Sao_Paulo');

$envPath = dirname(__DIR__, 1) . '/.env';

if (file_exists($envPath)) {
    $dotenv = Dotenv::createImmutable(dirname(__DIR__, 1));
    $dotenv->load();
}

$builder = new ContainerBuilder();

$definitions = require dirname(__DIR__) . '/src/Infra/Container/definitions.php';
$definitions($builder);

$container = $builder->build();

return $container;
