<section ng-controller="NgAbilityCtrl">
    <div class="row-fluid">
    	<div class="span12">
    		<h4>INTERESTS</h4>
    	</div>

    </div>

<!-- <div class="form-actions" ng-repeat="ability in abilities"> -->
    <!-- <h3><span class="ability-name">{{ability.name}}</span></h3> -->
    <!-- <p><span class="ability-description">{{ability.description}}</span></p> -->
    <!-- <p>Rating: <span class="abiltiy-rating"><?php// echo $ability->rating;?></span></p> -->
    <!-- <p><span class="abiltiy-active">{{ability.active}}</span></p> -->


    <article class="repeater" ng-repeat="ability in abilities">
        <div class="row-fluid top-section">
            <div class="span10">
                <div class="edit-hidden thing-appearing animated" ng-hide="!editswitch">
                    <input type="text" class="form-control" id="inputName" ng-model="inputName" placeholder="{{ability.name}}" />
                </div>
                <div class="thing-leaving animated" ng-hide="editswitch"><h5>{{ability.name}}</h5></div>
            </div>
            <div class="span2">
                <a ng-click="editswitch = !editswitch" class="edit">edit</a>
            </div>
        </div>
        <div class="edit-field" ng-hide="!editswitch">
            <textarea class="form-control" id="abilityFormData.description" ng-model="abilityFormData.description" placeholder="{{ability.description}}" rows="4">{{ability.description}}</textarea>
        </div>
    </article>

</section>
