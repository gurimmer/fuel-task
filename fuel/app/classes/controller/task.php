<?php
class Controller_Task extends Controller_Template{

	public function action_index()
	{
		$data['tasks'] = Model_Task::find('all');
		$this->template->title = "Tasks";
		$this->template->content = View::forge('task/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('task');

		if ( ! $data['task'] = Model_Task::find($id))
		{
			Session::set_flash('error', 'Could not find task #'.$id);
			Response::redirect('task');
		}

		$this->template->title = "Task";
		$this->template->content = View::forge('task/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Task::validate('create');
			
			if ($val->run())
			{
				$task = Model_Task::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
					'parent' => Input::post('parent'),
					'finished' => Input::post('finished'),
					'deleted' => Input::post('deleted'),
				));

				if ($task and $task->save())
				{
					Session::set_flash('success', 'Added task #'.$task->id.'.');

					Response::redirect('task');
				}

				else
				{
					Session::set_flash('error', 'Could not save task.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Tasks";
		$this->template->content = View::forge('task/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('task');

		if ( ! $task = Model_Task::find($id))
		{
			Session::set_flash('error', 'Could not find task #'.$id);
			Response::redirect('task');
		}

		$val = Model_Task::validate('edit');

		if ($val->run())
		{
			$task->name = Input::post('name');
			$task->description = Input::post('description');
			$task->parent = Input::post('parent');
			$task->finished = Input::post('finished');
			$task->deleted = Input::post('deleted');

			if ($task->save())
			{
				Session::set_flash('success', 'Updated task #' . $id);

				Response::redirect('task');
			}

			else
			{
				Session::set_flash('error', 'Could not update task #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$task->name = $val->validated('name');
				$task->description = $val->validated('description');
				$task->parent = $val->validated('parent');
				$task->finished = $val->validated('finished');
				$task->deleted = $val->validated('deleted');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('task', $task, false);
		}

		$this->template->title = "Tasks";
		$this->template->content = View::forge('task/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('task');

		if ($task = Model_Task::find($id))
		{
			$task->delete();

			Session::set_flash('success', 'Deleted task #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete task #'.$id);
		}

		Response::redirect('task');

	}


}
