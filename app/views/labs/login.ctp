<?php
	echo $this->Form->create();
	echo $this->Form->input('User.email');
	echo $this->Form->input('User.password');
	echo $this->Form->end(__('Submit', true));
?>