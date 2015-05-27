<?php
/**
 * Created by PhpStorm.
 * User: gurimmer
 * Date: 2014/11/18
 * Time: 11:13
 */

namespace Unittest;


class Fieldset extends \Fuel\Core\Fieldset {
    public static function reset(){
        parent::$_instances = array();
    }
} 