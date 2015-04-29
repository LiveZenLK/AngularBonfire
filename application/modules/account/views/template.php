<!-- This is the routing component -->

<section ng-controller="NgAccountCtrl" class="controller">
    <div class="row modern-account-nav">
        <nav>
                <div class="col-4 desktop-4 should-be-a-link route {{route.image}}" ng-repeat="route in routes" >
                    <a href="#" ui-sref="{{route.account_route}}" class="account-menu" ui-sref-active-eq="active">{{route.name}}<span class="div-link-hack"></span></a>
                </div>
        </nav>
    </div>
    <div class="row modern-account">
        <div class="col-12 col-desktop-4">
            <!-- <div class="container"> -->
            <aside class="interface">
                <div ui-view="actions">
                    ui view content            
                </div>
            </aside>
            <aside class="interface">
                <div ui-view="status">
                    ui view content
                </div>
            </aside>
            <!-- </div> -->
        </div>
        <div class="col-12 col-desktop-8">
            <!-- <div class="container"> -->
                <main class="interface">
                    <div ui-view="content">
                        ui view content
                    </div>
                </main>
            <!-- </div> -->
        </div>
    </div><!-- end row fluid -->
</section>
