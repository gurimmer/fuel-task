<?php
/**
 * Created by PhpStorm.
 * User: gurimmer
 * Date: 2014/11/17
 * Time: 0:18
 */

class Test_Controller_Task extends DbTestCase {

    protected $tables = array(
        'tasks' => 'tasks'
    );

    protected function setUp(){
        Session::destroy();
        Request::reset_request(true);
        InputEx::reset();
        Fieldset::reset();

        parent::setUp();
    }

	public function test_action_index()
	{
		$response = Request::forge('task/index')
		      ->set_method('GET')
		      ->execute()
		      ->response();
	}

	public function test_action_create()
	{
		$response = Request::forge('task/create')
			->set_method('GET')
			->execute()
			->response();
	}

	public function test_action_create_2_save()
	{
        $allCount = Model_Task::count();

        $_POST["name"] = 'test123';
        $_POST["description"] = 'test description';

		$response = Request::forge('task/create')
					->set_method('POST')
					->execute()
					->response();

        $this->assertEquals($allCount+1, Model_Task::count());
	}

	public function test_action_view_name_and_description()
	{
		$id = 1;
		$response = Request::forge('task/view')
		      ->set_method('GET')
		      ->execute(['id' => $id])
		      ->response();
	}

    public function test_action_view_all()
    {
        $id = 2;
        $response = Request::forge('task/view')
            ->set_method('GET')
            ->execute(['id' => $id])
            ->response();
    }

} 