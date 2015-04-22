<h1><?php echo $username;?>'s Profile</h1>

<!-- // Load the Account section routing module -->
<?php echo Modules::run('profile/widget', 1); ?>

<?php print_r($abilities);?>