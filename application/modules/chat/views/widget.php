<hr/>
<?php echo $username;?>
<h4>Contact This User</h4>
<?php if (empty($current_user)) : ?>
	You must be <a href="<?php echo site_url(); ?>">registered</a> to reach out to people. 
<?php else : ?>
	<form ng-controller="ChatWidgetCtrl" ng-submit="send()">
    	<input type="hidden" ng-init="formData.recipient_id='<?php echo $username; ?>'"  ng-model="formData.recipient_id" >
    	<textarea placeholder="message goes here" ng-model="formData.message"></textarea>
    	<input type="submit" class="button" value="Send"c>
	</form>
<?php endif; ?>
<hr/>



