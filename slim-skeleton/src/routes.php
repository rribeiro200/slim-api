<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->options();

// Routes
require __DIR__ . '/routes/autenticacao.php';
require __DIR__ . '/routes/produtos.php';

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:._}', function($req, $res) {
    
    $handler = $this->notFoundHandler;
    return $handler($req, $res);
});