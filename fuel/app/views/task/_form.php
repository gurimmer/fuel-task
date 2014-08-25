<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($task) ? $task->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Parent', 'parent', array('class'=>'control-label')); ?>

				<?php echo Form::input('parent', Input::post('parent', isset($task) ? $task->parent : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Parent')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Finished', 'finished', array('class'=>'control-label')); ?>

				<?php echo Form::input('finished', Input::post('finished', isset($task) ? $task->finished : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Finished')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Deleted', 'deleted', array('class'=>'control-label')); ?>

				<?php echo Form::input('deleted', Input::post('deleted', isset($task) ? $task->deleted : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Deleted')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>