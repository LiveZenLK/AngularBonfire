<div class="row" ng-controller="AccountLocationCtrl">
    <div class="col-6" >
        <input type="text" ng-model="location" placeholder="town,country" value="{{location}}" style="white-space: pre-line">
        
        <input type="submit" href="#" class="button" ng-click="saveLocation(location)" value="Save"/><p>{{saved}}</p>
    </div>
    <div class="col-6">
        <weather details="{{location}}"></weather>
		{{location}}
    </div>
</div>
