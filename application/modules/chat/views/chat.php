<hr/>
<?php echo $username;?>
<h4>Contact This User</h4>
<?php if (empty($current_user)) : ?>
	You must be <a href="<?php echo site_url(); ?>">registered</a> to reach out to people. 
<?php else : ?>
    Add friend
<?php endif; ?>
<hr/>


