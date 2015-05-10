<hr/>

<h3>Contact <?php echo $username;?></h3> 
<br/>
<?php if ($current_user == FALSE) : ?>
	<?php //echo Modules::run('join/cta'); ?>
	You must be <a href="<?php echo site_url(); ?>/register">registered</a> to reach out to people. 
<?php else : ?>
	<form ng-controller="ChatWidgetCtrl" ng-submit="send()">
    	<input type="hidden" ng-init="formData.recipient_id='<?php echo $username; ?>'"  ng-model="formData.recipient_id" >
    	<textarea placeholder="message goes here" ng-model="formData.message"></textarea>
    	<input type="submit" class="button" value="Send"c>
	</form>

	<button class="button button-small success"><span>&#9733;</span><span>&#9734;</span></button>
<?php endif; ?>
<hr/>
<!-- 

☰	9776	2630	 	TRIGRAM FOR HEAVEN
☱	9777	2631	 	TRIGRAM FOR LAKE
☲	9778	2632	 	TRIGRAM FOR FIRE
☳	9779	2633	 	TRIGRAM FOR THUNDER
☴	9780	2634	 	TRIGRAM FOR WIND
☵	9781	2635	 	TRIGRAM FOR WATER
☶	9782	2636	 	TRIGRAM FOR MOUNTAIN
☷	9783	2637	 	TRIGRAM FOR EARTH


 -->