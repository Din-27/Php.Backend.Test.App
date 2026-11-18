<?php
header('Content-Type: application/json');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/health') {
    echo json_encode([
        'status' => 'ok',
        'runtime' => 'PHP ' . phpversion()
    ]);
    exit;
}

echo json_encode([
    'message' => 'Deployment Test Success - PHP',
    'runtime' => 'PHP ' . phpversion(),
    'hostname' => gethostname(),
    'host' => $_SERVER['HTTP_HOST'] ?? null,
    'x_forwarded_proto' => $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? null,
    'env_test' => getenv('TEST_MESSAGE') ?: 'not set'
], JSON_PRETTY_PRINT);
