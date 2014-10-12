<?php
/**
 * Created by PhpStorm.
 * User: gurimmer
 * Date: 2014/10/10
 * Time: 17:08
 */

class View_Task_Result extends ViewModel {

    public function view()
    {
        $this->id = $this->request()->param('id');
    }

} 