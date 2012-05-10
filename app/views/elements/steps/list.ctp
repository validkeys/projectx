<?php foreach ($steps as $step): ?>
	<div class="step-item-container">
		<div class="todo-form">
			<?php
				echo $form->create('Step', array('action'	=> 'toggle'));
					echo $form->input('id', array('value'	=> $step['Step']['id']));
					echo $form->input('completed',array(
						'checked'	=> ($step['Step']['completed']) ? true : false
					));
				echo $form->end('Submit');
			?>
		</div>
		<div class="date">
			<ul>
				<li class="day"><?php echo date('d',strtotime($step['Step']['due'])) ?></li>
				<li class="month"><small><?php echo date('M',strtotime($step['Step']['due'])) ?></small></li>
				<li class="year"><small><?php echo date('Y',strtotime($step['Step']['due'])) ?></small></li>
			</ul>
		</div>
		<div class="title"><?php echo $step['Step']['title'] ?></div>
	</div>
<?php endforeach ?>