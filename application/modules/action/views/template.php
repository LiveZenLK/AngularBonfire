<section ng-controller="NgActionCtrl">
<aside class="interface">
    <a class="action {{action.image}}" ng-repeat="action in actions" ng-click="doAction(action.action_name)">

        <h6><span class="action-name">{{action.action_name}}</span></h6>
        <!-- <p><span class="action-description">{{action.description}}</span></p> -->
        <!-- <p>Rating: <span class="abiltiy-rating"><?php// echo $action->rating;?></span></p> -->
        <!-- <p><span class="abiltiy-active">{{action.active}}</span></p> -->
    </a>
</aside>
    <div ui-view="list">

    </div>
    <div ui-view="content">
        <!-- sidebar view -->
        ui view content
    </div>
</section>



<!-- <section ng-app="todoApp"> 
 <span>{{todoList.remaining()}} of {{todoList.todos.length}} remaining</span>
[ <a href="" >archive</a> ]
<ul class="unstyled">
<li ng-repeat="todo in todoList.todos">
<input type="checkbox" ng-model="todo.done">
<span class="done-{{todo.done}}">{{todo.text}}</span>
</li>
</ul> -->

