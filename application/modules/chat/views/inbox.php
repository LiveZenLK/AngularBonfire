<div ng-controller="ChatCtrl">
	<div ng-if="messages != 'FALSE'">
	<article ng-repeat="message in messages">
		<a href="#" ng-click="open = !open">{{message.username}}</a>
		<div class="message-body" ng-hide="!open">{{message.message}}
			<a href="#" ng-click="reply(message.username)">reply</a>
		</div>
	</article>
	</div>
	<div ng-if="messages == 'FALSE'">
		You don't have any messages, have you completed your profile and added skills?
	</div>
</div>
