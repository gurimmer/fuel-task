<?php

// Load in the Autoloader
require COREPATH.'classes'.DIRECTORY_SEPARATOR.'autoloader.php';
class_alias('Fuel\\Core\\Autoloader', 'Autoloader');

// Bootstrap the framework DO NOT edit this
require COREPATH.'bootstrap.php';


Autoloader::add_classes(array(
	// Add classes you want to override here
	// Example: 'View' => APPPATH.'classes/view.php',
));

// Register the autoloader
Autoloader::register();

/**
 * Your environment.  Can be set to any of the following:
 *
 * Fuel::DEVELOPMENT
 * Fuel::TEST
 * Fuel::STAGING
 * Fuel::PRODUCTION
 */

Fuel::$env = (isset($_SERVER['FUEL_ENV']) ? $_SERVER['FUEL_ENV'] : Fuel::DEVELOPMENT);

// Initialize the framework with the config file.
Fuel::init('config.php');

if (array_key_exists('HEROKU_POSTGRESQL_BLACK_URL', $_SERVER)) {
    $dbConfigPattern = '/postgres:\/\/(?:([^:^@]+)(?::([^@]+))?@)?([^:^\/]+)(?::(\d+))?\/(.+)/';
    if (preg_match($dbConfigPattern, $_SERVER["HEROKU_POSTGRESQL_BLACK_URL"], $matches)) {
        list($dbConfig, $dbuser, $dbpass, $dbhost, $dbport, $dbname) = $matches;
        Config::set('migrations.connection.dsn', 'pgsql:host='.$dbhost.';dbname='.$dbname);
        Config::set('migrations.connection.username', $dbuser);
        Config::set('migrations.connection.password', $dbpass);
        Config::save('migrations', 'migrations');

        Config::set('db.development.default.type', 'pdo');
        Config::set('db.development.default.table_prefix', '');
        Config::set('db.development.default.connection.dsn', 'pgsql:host='.$dbhost.';dbname='.$dbname);
        Config::set('db.development.default.connection.username', $dbuser);
        Config::set('db.development.default.connection.password', $dbpass);
        Config::save('db', 'db');
    }
} else {
    Config::set('migrations.connection.dsn', 'mysql:host=localhost;dbname=fuel_task');
    Config::set('migrations.connection.username', 'root');
    Config::set('migrations.connection.password', 'root');
    Config::save('migrations', 'migrations');

    Config::set('db.development.default.type', 'pdo');
    Config::set('db.development.default.table_prefix', '');
    Config::set('db.development.default.connection.dsn', 'mysql:host=localhost;dbname=fuel_task');
    Config::set('db.development.default.connection.username', 'root');
    Config::set('db.development.default.connection.password', 'root');
    Config::save('db', 'db');
}
