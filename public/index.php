<?php

session_start();
date_default_timezone_set('America/Sao_Paulo');

require __DIR__ . '/../vendor/autoload.php';

if (PHP_SAPI == 'cli-server') {
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

$app = new \App\Application();

require __DIR__ . '/../config/routes/system.php';

$app->run();
