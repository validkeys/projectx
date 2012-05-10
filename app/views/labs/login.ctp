<?php
	echo $html->link(__('Create An Account',true),array('controller'	=> 'users','action'	=> 'add'));
	echo $this->Form->create();
	echo $this->Form->input('User.email');
	echo $this->Form->input('User.password');
	echo $this->Form->end(__('Submit', true));
?>