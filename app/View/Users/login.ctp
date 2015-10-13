<!-- View/Users/login.ctp -->
<?php echo $this->Html->tag('h1', 'Login'); ?>

<?php
	echo $this->Form->create('User');
	echo $this->Form->input('username');
	echo $this->Form->input('password', array('type' => 'password'));
	echo $this->Form->end(__('Login'));
?>

<?php echo $this->Html->link(__('Or Add User'), array('controller' => 'users', 'action' => 'add')); ?>
