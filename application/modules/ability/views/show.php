            <?php //echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal', 'autocomplete' => 'off')); ?>
                <?php //print_r($abilities); ?>
                <?php foreach ($abilities as $ability): ?>
                    <div class="form-actions">
                    
                    <!-- foreach ability as current.abilility -->
                    <h3><span class="ability-name"><?php echo $ability->name;?></span></h3>
                    <p><span class="ability-description"><?php echo $ability->description;?></span></p>
                    <p>Rating: <span class="abiltiy-rating"><?php echo $ability->rating;?></span></p>
                    <p><span class="abiltiy-active"><?php echo $ability->active;?></span></p>
                </div>
                <?php endforeach ?>
            <?php //echo form_close(); ?>
             <div>
<label>Name:</label>
<!-- <input type="text" ng-model="yourName" placeholder="Enter a name here"> -->
<hr>
<!-- <h1>Hello {{yourName}}!</h1> -->
</div>
<!-- <section ng-app="todoApp"> -->
 <h2>Todo</h2>
<div ng-controller="NgAbility">
{{user}}
</div>

<div ui-view="content">
    <!-- sidebar view -->
    ui view content
</div>


<!-- <span>{{todoList.remaining()}} of {{todoList.todos.length}} remaining</span>
[ <a href="" ng-click="todoList.archive()">archive</a> ]
<ul class="unstyled">
<li ng-repeat="todo in todoList.todos">
<input type="checkbox" ng-model="todo.done">
<span class="done-{{todo.done}}">{{todo.text}}</span>
</li>
</ul>
<form ng-submit="todoList.addTodo()">
<input type="text" ng-model="todoList.todoText" size="30"
placeholder="add new todo here">
<input class="btn-primary" type="submit" value="add">
</form>
</div> -->
<!-- </section> -->