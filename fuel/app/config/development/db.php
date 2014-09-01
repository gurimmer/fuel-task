<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
    'mongo' => array(
        'default' => array(
            'hostname'   => Config::get("MONGODB_HOST"),
            'port'       => Config::get("MONGODB_PORT"),
            'database'   => Config::get("MONGODB_NAME"),
            'username'   => Config::get("MONGODB_USER"),
            'password'   => Config::get("MONGODB_PASS"),
        ),
    ),
);
