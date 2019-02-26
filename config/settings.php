<?php
$config_server = parse_ini_file(__DIR__ . '/../config.ini');

return [
    'displayErrorDetails' => $config_server['display-erros'],
    'db.host' => $config_server['db-host'],
    'db.database' => $config_server['db-database'],
    'db.user' => $config_server['db-user'],
    'db.pass' => $config_server['db-pass']
];