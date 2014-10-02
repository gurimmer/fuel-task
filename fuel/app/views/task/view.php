<h2>Viewing <span class='muted'>#<?php echo $task->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $task->name; ?></p>
<p>
	<strong>Parent:</strong>
	<?php echo $task->parent; ?></p>
<p>
	<strong>Finished:</strong>
	<?php echo $task->finished; ?></p>
<p>
	<strong>Deleted:</strong>
	<?php echo $task->deleted; ?></p>

<?php echo Html::anchor('task/edit/'.$task->id, 'Edit'); ?> |
<?php echo Html::anchor('task', 'Back'); ?>