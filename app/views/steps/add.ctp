<?php echo $this->element('steps/form',array('edit_mode'	=> true)) ?>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Steps', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Experiments', true), array('controller' => 'experiments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Experiment', true), array('controller' => 'experiments', 'action' => 'add')); ?> </li>
	</ul>
</div>