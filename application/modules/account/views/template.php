<!-- This is the routing component -->

<section ng-controller="NgAccountCtrl">
    <div class="row-fluid">

        <div class="span4">

            <aside class="interface">
                <h4>MENU</h4>
                <h4><a class="route {{route.image}}" ng-repeat="route in routes" ng-click="doRoute(route.account_route)">
                    <span class="account-menu">{{route.name}}</span>
                </a></h4>
            </aside>

            <aside class="interface">
                <h4>SECONDARY ACTIONS</h4>
                <div ui-view="actions">
                    ui view content            
                </div>
            </aside>

            <aside class="interface">
                <h4>STATUS</h4>
                <div ui-view="status">
                    ui view content
                </div>
            </aside>

        </div>

        <div class="span4">
        
            <main ui-view="content">
                ui view content
            </main>
        
        </div>

        <div class="span4">
        
            <h4>Friends</h4>    
            <aside class="interface">
                Under Construction
            </aside>
        
        </div>

    </div><!-- end row fluid -->
</section>
