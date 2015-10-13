<!-- View/Users/index.ctp -->
<?php echo $this->Html->tag('h1', __('User list')); ?>

<?php foreach($users as $user): ?>
<ul>
	<li><?php echo $user['User']['username']; ?></li>
</ul>
<?php endforeach; ?>

<?php 
	if (isset($logged_user)) {
		echo $this->Html->link("Logout", ['controller' => 'users', 'action' => 'logout']);	
		echo " | ";	
		echo $this->Html->link("View profile", ['controller' => 'users', 'action' => 'profile']);
	}
?>

<?php 
	unset($users);
	unset($logged_user); 
?>
