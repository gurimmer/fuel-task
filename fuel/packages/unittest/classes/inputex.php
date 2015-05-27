<?php
/**
 * Created by PhpStorm.
 * User: gurimmer
 * Date: 2014/11/18
 * Time: 11:15
 */

namespace Unittest;


class InputEX extends \Fuel\Core\Input {
    public static function reset(){
        parent::$input = null;
    }
} 