<div class="back-to-dash">
	<?php echo $html->link(__('Back to Dashboard',true),array('controller'	=> 'experiments','action'	=> 'index')) ?>
</div>

<div class="project-title">
	<?php
		echo "I want to {$experiment['Experiment']['action']} the {$experiment['Experiment']['noun']} you want to {$experiment['Experiment']['verb']}";
	?>
	
	<ul>
		<li><?php echo $html->link(__('Back to Dashboard',true),array('controller'	=> 'experiments','action'	=> 'edit',$experiment['Experiment']['id'])); ?></li>
		<li><?php echo $html->link(__('Archive',true),array('controller'	=> 'experiments','action'	=> 'delete')) ?></li>
	</ul>
</div>

<div class="proj-status-container">
	<h2>Status Report:</h2>
	<table>
		<tr>
			<td><h2><?php echo $number->toPercentage($status['percentage_completed']) ?></h2></td>
			<td><h2>TODO</h2></td>
			<td><h2><?php echo $status['days_remaining'] ?></h2></td>
		</tr>
		<tr>
			<td><small>of all steps<br />completed</small></td>
			<td><small>How Efficiently<br />You're Working</small></td>
			<td><small>Days Until you are done</small></td>
		</tr>
	</table>
</div>

<div class="steps-container">
	<?php echo $this->element('steps/list',array('steps'	=> $steps)) ?>
</div>

