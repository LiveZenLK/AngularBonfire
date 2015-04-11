
<div class="form-actions" ng-repeat="ability in abilities">
    <h3><span class="ability-name">{{ability.name}}</span></h3>
    <p><span class="ability-description">{{ability.description}}</span></p>
    <!-- <p>Rating: <span class="abiltiy-rating"><?php// echo $ability->rating;?></span></p> -->
    <p><span class="abiltiy-active">{{ability.active}}</span></p>
</div>

