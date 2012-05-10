<div class="experiments form">
<?php echo $this->Form->create('Experiment');?>
	<fieldset>
		<legend><?php __('Edit Experiment'); ?></legend>
	<?php
		echo ($edit_mode == true) ? $this->Form->input('id') : '';
		echo $this->Form->input('action');
		echo $this->Form->input('noun');
		echo $this->Form->input('verb');
		// echo $this->Form->input('user_id');
		echo $this->Form->input('completed');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
