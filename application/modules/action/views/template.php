<!-- This is the routing component -->


<section ng-controller="NgActionCtrl">
    <div class="row-fluid">
        <div class="span4">
        	<!-- sidebar view -->
            <h4>ACTIONS</h4>
			<aside class="interface">
    			<h4><a class="action {{action.image}}" ng-repeat="action in actions" ng-click="doAction(action.action_name)">

        			<span class="action-name">{{action.action_name}}</span>
        			<!-- <p><span class="action-description">{{action.description}}</span></p> -->
        			<!-- <p>Rating: <span class="abiltiy-rating"><?php// echo $action->rating;?></span></p> -->
        			<!-- <p><span class="abiltiy-active">{{action.active}}</span></p> -->
    			</a></h4>
			</aside>
            <!-- <h4>ABILITIES</h4> -->
    		<!-- <div ui-view="list"> -->
    		<!-- </div> -->
        </div>
        <div class="span8">
                    


    		<div ui-view="content">
        		ui view content
			
    		</div>
        </div>
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

