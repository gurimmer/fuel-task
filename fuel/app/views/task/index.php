<h2>Listing <span class='muted'>Tasks</span></h2>
<br>
<?php if ($tasks): var_dump($tasks); exit;?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Parent</th>
			<th>Finished</th>
			<th>Deleted</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($tasks as $item): ?>		<tr>

			<td><?php echo $item['name']; ?></td>
			<td><?php echo $item['parent']; ?></td>
			<td><?php echo $item['finished']; ?></td>
			<td><?php echo $item['deleted']; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('task/view/'.$item['_id']['oid'], '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('task/edit/'.$item['_id']['oid'], '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('task/delete/'.$item['_id']['oid'], '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Tasks.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('task/create', 'Add new Task', array('class' => 'btn btn-success')); ?>

</p>
