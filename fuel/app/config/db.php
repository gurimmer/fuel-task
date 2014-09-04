<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
    'mongo' => array(
        'default' => array(
            'hostname'   => Config::get('mongodb.host'),
            'port'       => Config::get('mongodb.port'),
            'database'   => Config::get('mongodb.name'),
            'username'   => Config::get('mongodb.user'),
            'password'   => Config::get('mongodb.pass'),
        ),
    ),
);
