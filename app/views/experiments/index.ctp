<div class="experiments index">
	<h2><?php __('Experiments');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('action');?></th>
			<th><?php echo $this->Paginator->sort('noun');?></th>
			<th><?php echo $this->Paginator->sort('verb');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('complete');?></th>
			<th><?php echo $this->Paginator->sort('date_completed');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($experiments as $experiment):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $experiment['Experiment']['id']; ?>&nbsp;</td>
		<td><?php echo $experiment['Experiment']['action']; ?>&nbsp;</td>
		<td><?php echo $experiment['Experiment']['noun']; ?>&nbsp;</td>
		<td><?php echo $experiment['Experiment']['verb']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($experiment['User']['name'], array('controller' => 'users', 'action' => 'view', $experiment['User']['id'])); ?>
		</td>
		<td><?php echo $experiment['Experiment']['complete']; ?>&nbsp;</td>
		<td><?php echo $experiment['Experiment']['date_completed']; ?>&nbsp;</td>
		<td><?php echo $experiment['Experiment']['created']; ?>&nbsp;</td>
		<td><?php echo $experiment['Experiment']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $experiment['Experiment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $experiment['Experiment']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $experiment['Experiment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $experiment['Experiment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Experiment', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Steps', true), array('controller' => 'steps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Step', true), array('controller' => 'steps', 'action' => 'add')); ?> </li>
	</ul>
</div>