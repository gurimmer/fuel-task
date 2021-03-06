<?php

if (array_key_exists('CLEARDB_DATABASE_URL', $_SERVER)) {
    $dbConfigPattern = '/mysql:\/\/(?:([^:^@]+)(?::([^@]+))?@)?([^:^\/]+)(?::(\d+))?\/([^?]+)/';
    if (preg_match($dbConfigPattern, $_SERVER["CLEARDB_DATABASE_URL"], $matches)) {
        list($dbConfig, $dbuser, $dbpass, $dbhost, $dbport, $dbname) = $matches;
        return array(
            'default' => array(
                'connection'  => array(
                    'dsn'        => 'mysql:host='.$dbhost.';dbname='.$dbname,
                    'username'   => $dbuser,
                    'password'   => $dbpass,
                ),
            ),
        );
    }
}

return array(
    'default' => array(
        'connection'  => array(
            'dsn'        => 'mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;host=localhost;dbname=fuel_task',
            'username'   => 'root',
            'password'   => 'root',
        ),
    ),
);
