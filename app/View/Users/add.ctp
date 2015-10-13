<!-- View/Users/add.ctp -->
<?php
	echo $this->Html->tag('h1', __('Add User'));
	echo $this->Form->create('User');
	echo $this->Form->input('username', array('label' => 'Username'));
	echo $this->Form->input('password', array('label' => 'Password', 'type' => 'password'));
	echo $this->Form->input('role', array('label' => 'Role', 'default' => 'Member'));
	echo $this->Form->input('email', array('label' => 'Email'));
	echo $this->Form->end(__('Add User'));
?>
