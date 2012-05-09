<div class="steps form">
<?php echo $this->Form->create('Step');?>
	<fieldset>
		<legend><?php __('Edit Step'); ?></legend>
	<?php
		echo ($edit_mode) ? $this->Form->input('id') : '';
		echo $this->Form->input('title');
		echo $this->Form->input('notes');
		echo $this->Form->input('order');
		echo $this->Form->input('experiment_id');
		echo $this->Form->input('completed');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
