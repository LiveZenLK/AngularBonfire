<section ng-controller="NgAbilityCtrl">
    <div class="row-fluid">
    	<div class="span12">
    		<h4>INTERESTS</h4>
    	</div>

    </div>

<!-- <div class="form-action s" ng-repeat="ability in abilities"> -->
    <!-- <h3><span class="ability-name">{{ability.name}}</span></h3> -->
    <!-- <p><span class="ability-description">{{ability.description}}</span></p> -->
    <!-- <p>Rating: <span class="abiltiy-rating"><?php// echo $ability->rating;?></span></p> -->
    <!-- <p><span class="abiltiy-active">{{ability.active}}</span></p> -->


    <article class="repeater" ng-repeat="ability in abilities">

        <form>
        
        <div class="row-fluid top-section">
            

            <div class="span10">
                <div class="edit-hidden thing-appearing animated" ng-hide="!editswitch">
                    <input type="text" 
                    class="form-control" 
                    id="inputName" 
                    ng-model="ability.name" 
                    placeholder="{{ability.name}}" 
                    />
                </div>
                <div class="thing-leaving animated" ng-hide="editswitch"><h5>{{ability.name}}</h5></div>
            </div>
            <div class="span2">
                <span ng-hide="editswitch">
                    <a href="#" class="btn btn-small btn-success" ng-click="editswitch = !editswitch" class="edit">
                    edit</a>
                </span>
                <span ng-hide="!editswitch">
                    <a href="#" class="button" ng-click="editswitch = !editswitch" class="edit">
                    close</a>
                </span>
            </div>
        </div>
        <div class="edit-hidden thing-appearing animated edit-field" ng-hide="!editswitch">
            <textarea class="form-control" 
            id="{{abilityFormData.description}}" 
            ng-model="ability.description" 
            rows="4">
            {{ability.description}}</textarea>
            <!-- not we submit form with ng-click here rather than ng-submit to preserve data binding from model -->
            <input class="btn-primary" type="submit" ng-click="updateAbility(ability)" value="save">
        </div>

        </form>

    </article>

</section>




