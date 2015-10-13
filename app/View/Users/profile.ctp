<!-- View/Users/profile.ctp -->
<?php echo $this->Html->tag('h1', 'Your profile'); ?>
<?php
	if (isset($logged_user)) {
		echo "<pre>";
		print_r($logged_user);
		echo "</pre>";
	}
?>
