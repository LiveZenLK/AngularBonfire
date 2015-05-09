<div class="row conversation-filter" ng-controller="CloudCtrl">
	<div class="col-2 main-filters">
		<h4 class="well-title">Active Filters</h4>
		<div class="well">
			<button class="btn btn-primary" 
				ng-click="removeFilter(skill)" 
				ng-repeat="skill in filters" ng-animate=" 'animate' ">
				{{skill}}
			</button>
		</div>
	</div>
	<div class="col-8">
		<div class="skills-list">
		<!-- {{skills}} -->
			<button class="tc tc-{{skill.weight}}" 
				ng-click="addFilter(skill.text)" 
				ng-repeat="skill in skills">
				{{skill.text}}
				<!-- <span class="label label-info"> {{skill.weight}}</span> -->
			</button>
			<!-- <cloud skills="{{skills}}"></cloud>
			<!-- <cloud ng-repeat="skill in skills" value="{{skill.weight}}" skill="{{skill.text}}"> -->

		</div>
	</div>
	<div class="col-2">
		<h4 class="well-title">Candidates</h4>
		<div class="well">
			<ul>
				<li ng-repeat="candidate in activeUsers" ng-animate=" 'animate' ">
					<a href="<?php echo site_url();?>/profile/{{candidate.username}}" class="btn btn-success" 
					>{{candidate.username}}</a>
				</li>
			</ul>
		</div>
		
	</div>
</div>