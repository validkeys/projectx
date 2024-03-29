<div class="steps index">
	<h2><?php __('Steps');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('notes');?></th>
			<th><?php echo $this->Paginator->sort('order');?></th>
			<th><?php echo $this->Paginator->sort('experiment_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('completed');?></th>
			<th><?php echo $this->Paginator->sort('date_completed');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($steps as $step):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $step['Step']['id']; ?>&nbsp;</td>
		<td><?php echo $step['Step']['title']; ?>&nbsp;</td>
		<td><?php echo $step['Step']['notes']; ?>&nbsp;</td>
		<td><?php echo $step['Step']['order']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($step['Experiment']['action'], array('controller' => 'experiments', 'action' => 'view', $step['Experiment']['id'])); ?>
		</td>
		<td><?php echo $step['Step']['created']; ?>&nbsp;</td>
		<td><?php echo $step['Step']['modified']; ?>&nbsp;</td>
		<td><?php echo $step['Step']['completed']; ?>&nbsp;</td>
		<td><?php echo $step['Step']['date_completed']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $step['Step']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $step['Step']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $step['Step']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $step['Step']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Step', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Experiments', true), array('controller' => 'experiments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Experiment', true), array('controller' => 'experiments', 'action' => 'add')); ?> </li>
	</ul>
</div>