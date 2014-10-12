<?php
class Controller_Task extends Controller_Rest{

	public function get_index()
	{
        $id = $this->param('id');
        Log::debug('task::index id = '.$id);
        if(is_null($id)) {
            $tasks = Model_Task::find('all');
        } else {
            $task = Model_Task::find($id);
            $tasks[] = $task;
        }
        Log::debug('task::index tasks = '.print_r($tasks, true));
        return $this->response($tasks);
	}

    public function get_action()
    {
        $id = $this->param('id');
        $action = $this->param('action');
        Log::debug('task::action id = '.$id);
        Log::debug('task::action action = '.$action);
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
