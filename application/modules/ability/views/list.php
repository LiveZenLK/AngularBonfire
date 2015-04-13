<!-- <a href="#" ng-click="add()" class="btn btn-success">Add</a> -->
<section ng-controller="NgAbilityCtrl">
    <div class="row-fluid">
    	<div class="span6">
    		<h3>Abilities</h3>
    	</div>
    	<div class="span6">
			<form ng-submit="addAbility()">

				<input type="text" ng-model="abilityFormData.name" placeholder="Ability">
				<!-- <input style="display: none;" type="text" ng-model="abilityFormData.<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"> -->
				<!-- <input type="text" ng-model="abilityFormData.blah" value="<?php echo $this->security->get_csrf_hash(); ?>"> -->
				<input class="btn-primary" type="submit" value="add">

			</form>
    	</div>
    </div>

<div class="form-actions" ng-repeat="ability in abilities">
    <h3><span class="ability-name">{{ability.name}}</span></h3>
    <!-- <p><span class="ability-description">{{ability.description}}</span></p> -->
    <!-- <p>Rating: <span class="abiltiy-rating"><?php// echo $ability->rating;?></span></p> -->
    <!-- <p><span class="abiltiy-active">{{ability.active}}</span></p> -->
</div>
</section>

