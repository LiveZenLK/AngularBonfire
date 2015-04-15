<section ng-controller="NgAbilityCtrl">
    	<div class="span6">
			<form ng-submit="addAbility()">

				<input type="text" ng-model="abilityFormData.name" placeholder="Ability">
				<!-- <input style="display: none;" type="text" ng-model="abilityFormData.<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"> -->
				<!-- <input type="text" ng-model="abilityFormData.blah" value="<?php echo $this->security->get_csrf_hash(); ?>"> -->
				<input class="btn-primary" type="submit" value="add">

			</form>
    	</div>
</section>