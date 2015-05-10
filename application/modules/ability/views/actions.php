<section ng-controller="NgAbilityCtrl">
    	<div class="span6">

			<form ng-submit="addAbility()">

				<input type="text" ng-model="abilityFormData.name" placeholder="Interest">
				<input class="btn-primary" type="submit" value="add">

			</form>
    	
    	</div>
</section>