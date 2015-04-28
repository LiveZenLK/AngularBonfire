<!-- This is the routing component -->

<section ng-controller="NgAccountCtrl" class="controller">
    <div class="row modern-account-nav">

        <nav>
                <div class="col-4 desktop-4 should-be-a-link route {{route.image}}" ng-repeat="route in routes" >
                    <!-- <li > -->
                    <!-- <a  ng-click="doRoute(route.account_route)" class="account-menu">{{route.name}}<span class="div-link-hack"></span></a> -->
                    <a href="#" ui-sref="{{route.account_route}}" class="account-menu" ui-sref-active-eq="active">{{route.name}}<span class="div-link-hack"></span></a>
                    
                </div>
                <!-- </ul> -->
        </nav>
    </div>
    <div class="row modern-account">
        <div class="col-12 col-desktop-4">


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
        <div class="col-12 col-desktop-8">
            <main ui-view="content">
                ui view content
            </main>
            <aside class="interface">
            <h4>Friends</h4>    
                Under Construction
            </aside>
        
        </div>

        
        
    </div><!-- end row fluid -->
</section>
