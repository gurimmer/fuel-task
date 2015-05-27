<?php

Autoloader::add_core_namespace('Unittest');

Autoloader::add_classes(array(
	'Unittest\\Response' => __DIR__ . '/classes/unittest.php',
	'Unittest\\UnittestException' => __DIR__ . '/classes/unittest.php',
    'Unittest\\DbTestCase' => __DIR__ . '/classes/dbtestcase.php',
    'Unittest\\Fieldset' => __DIR__ . '/classes/fieldset_ex.php',
    'Unittest\\InputEx' => __DIR__ . '/classes/inputex.php'
));
