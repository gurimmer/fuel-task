<?php

Autoloader::add_core_namespace('Unittest');

Autoloader::add_classes(array(
	'Unittest\\Response' => __DIR__ . '/classes/unittest.php',
	'Unittest\\UnittestException' => __DIR__ . '/classes/unittest.php',

));
