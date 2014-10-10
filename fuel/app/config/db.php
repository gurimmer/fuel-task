<?php

if (array_key_exists('HEROKU_POSTGRESQL_BLACK_URL', $_SERVER)) {
    $dbConfigPattern = '/postgres:\/\/(?:([^:^@]+)(?::([^@]+))?@)?([^:^\/]+)(?::(\d+))?\/(.+)/';
    if (preg_match($dbConfigPattern, $_SERVER["HEROKU_POSTGRESQL_BLACK_URL"], $matches)) {
        list($dbConfig, $dbuser, $dbpass, $dbhost, $dbport, $dbname) = $matches;
        return array(
            'default' => array(
                'type' => 'pdo',
                'connection'  => array(
                    'dsn'        => 'pgsql:host='.$dbhost.';dbname='.$dbname,
                    'username'   => $dbuser,
                    'password'   => $dbpass,
                ),
                'identifier'   => '',
                'table_prefix' => '',
            ),
        );
    }
}

return array(
    'default' => array(
        'type' => 'pdo',
        'connection'  => array(
            'dsn'        => 'mysql:host=localhost;dbname=fuel_task',
            'username'   => 'root',
            'password'   => 'root',
        ),
    ),
);
