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

if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
    if (isset($languages[0]) && preg_match('/^en/i', $languages[0])) {
        Config::set('language', 'en');
    } else  {
        Config::set('language', 'ja');
    }
} else {
    Config::set('language', 'ja');
}

//Config::set('language', 'ja');
//Lang::load('main');

//if (isset($_SERVER['REQUEST_URI'])) {
//    $requestUri = $_SERVER['REQUEST_URI'];
//    if (preg_match('/\/lang\/([a-z]+)/', $requestUri, $matches)) {
//        Log::info('uri lang = '.$matches[1]);
//        if ($matches[1] !== 'ja') {
//            Config::set('language', 'en');
//        } else {
//            Config::set('language', 'ja');
//        }
//    } else {
//        Config::set('language', 'ja');
//    }
//}
//
//Lang::load('main');
