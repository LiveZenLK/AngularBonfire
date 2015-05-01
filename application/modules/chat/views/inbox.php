<div ng-controller="ChatCtrl">
	<article ng-repeat="message in messages">
		<a href="#" ng-click="open = !open">{{message.username}}</a>
		<div class="message-body" ng-hide="!open">{{message.message}}</div>
	</article>
</div>
