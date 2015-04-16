<div class="jumbotron lead-image " text-align="center" >
	<div class="fixed-for">
	  <div class="check-element animate-show blah one thing-leaving" ng-hide="editswitch">
	    <h1>AngularBonfire</h1>
	    <a href="#" class="btn btn-large btn-success" ng-click="editswitch = !editswitch">register</a>
	  </div>
	  <div class="check-element animate-show blah two thing-appearing" ng-hide="!editswitch">
		<?php echo Modules::run('join/now', 1); ?>
	  </div>
	</div>
</div>


<?php /*



	<h1>AngularBonfire</h1>
	<div class="login thing-leaving animated" ng-hide="editswitch">

		<p class="lead">A New Way To Discover Conversations.</p>

		<?php if (isset($current_user->email)) : ?>
			<a href="<?php echo site_url(SITE_AREA) ?>" class="btn btn-large btn-success">Go to the Admin area</a>
		<?php else :?>
			<a href="<?php echo site_url(LOGIN_URL); ?>" class="btn btn-large btn-info">test@gmail.com : testtest</a>
			<a href="#" class="btn btn-large btn-success" ng-click="editswitch = !editswitch">register</a>
		<?php endif;?>
	</div>

	<!-- <br/><br/><a href="<?php echo site_url('/docs') ?>" class="btn btn-large btn-info">Browse the Docs</a> -->

	<section class="login thing-appearing animated" ng-hide="!editswitch">

			<p class="lead">A New Way To Discover Conversations.</p>

		<?php if (isset($current_user->email)) : ?>
			<a href="<?php echo site_url(SITE_AREA) ?>" class="btn btn-large btn-success">Go to the Admin area</a>
		<?php else :?>
			<a href="<?php echo site_url(LOGIN_URL); ?>" class="btn btn-large btn-info">test@gmail.com : testtest</a>
			<a href="#" class="btn btn-large btn-success" ng-click="editswitch = !editswitch">register</a>
		<?php endif;?>
	</section>

</section>
*/?>