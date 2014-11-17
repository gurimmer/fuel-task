<?php
/**
 * Created by PhpStorm.
 * User: gurimmer
 * Date: 2014/11/17
 * Time: 0:18
 */



class Test_Controller_Task extends \Fuel\Core\TestCase {

	public function test_action_index()
	{
		$response = Request::forge('task/index')
		      ->set_method('GET')
		      ->execute()
		      ->response();

		$this->assertTag(array('tag' => 'form'), $response->body->__toString());;
	}

	public function test_action_create()
	{
		$response = Request::forge('task/create')
			->set_method('GET')
			->execute()
			->response();

		$this->assertTag(array('tag' => 'input', 'name' => 'name', 'content' => ''), $response->body->__toString());
		$this->assertTag(array('tag' => 'input', 'name' => 'description', 'content' => ''), $response->body->__toString());
		$this->assertTag(array('tag' => 'input', 'name' => 'parent', 'content' => ''), $response->body->__toString());
		$this->assertTag(array('tag' => 'input', 'name' => 'finished', 'content' => ''), $response->body->__toString());
		$this->assertTag(array('tag' => 'input', 'name' => 'deleted', 'content' => ''), $response->body->__toString());
	}

	public function test_action_create_2_save()
	{
		$response = Request::forge('task/create')
					->set_method('POST')
					->execute(['name' => 'test123', 'description' => 'test description'])
					->response();

		$this->assertTag(array('tag' => 'span', 'content' => 'Added task #'));
	}

	public function test_action_create_name_length()
		{
			$response = Request::forge('task/create')
						->set_method('POST')
						->execute(['name' => 'test123', 'description' => 'test description'])
						->response();

			$this->assertTag(array('tag' => 'span', 'content' => 'Added task #'));
		}

	public function test_action_view()
	{
		$id = 1;
		$response = Request::forge('task/view')
		      ->set_method('GET')
		      ->execute(['id' => $id])
		      ->response();

		$this->assertTag(array('tag' => 'span','class' => 'muted', 'content' =>'#'.$id), $response->body->__toString());
	}

} 