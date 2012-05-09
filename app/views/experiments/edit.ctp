<?php echo $this->element('experiments/form',array('edit_mode'	=> true)) ?>


<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Experiment.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Experiment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Experiments', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Steps', true), array('controller' => 'steps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Step', true), array('controller' => 'steps', 'action' => 'add')); ?> </li>
	</ul>
</div>