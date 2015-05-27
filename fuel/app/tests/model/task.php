<?php
/**
 * Created by PhpStorm.
 * User: gurimmer
 * Date: 2014/11/16
 * Time: 22:47
 */

class Test_Model_Task extends DbTestCase {

	public function test_create_task(){
		$count = count(Model_Task::find("all"));
	    $task = Model_Task::forge(array(
	      'name' => "task name",
		  'description' => 'description'
	    ));
		$task->save();

	    $update_count = count(Model_Task::find("all"));

	    $this->assertEquals($count+1,$update_count);
	}

} 