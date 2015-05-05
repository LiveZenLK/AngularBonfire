 <div class="controller" ng-controller="ProfileCtrl" ng-init="userInit('<?php echo $username;?>')">
    <div class="row modern-profile">
        <section class="col-12 col-desktop-3">
            <aside class="interface">
                <div class="row">
                  <div class="col-6">
                    <weather details="{{location}}"></weather>
                  </div>
                  <div class="col-6">
                    <img class="thumb" ng-src="<?php echo site_url();?>/images/{{profile.image_path}}">
                  </div>
                </div>
            </aside>
            <aside class="interface">
              <?php echo Modules::run('chat/widget', $username); ?>
            </aside>
        </section>
        <section class="col-12 col-desktop-4">
            <main class="interface account-profile-preview">
              <div marked="profile.account_profile"></div>
            </main>
        </section>
        <section class="col-12 col-desktop-2">
            <nav class="interface">
              <interestlist my-attr="<?php echo $username;?>"></interestlist> 
            </nav>         
        </section>
        <section class="col-12 col-desktop-3">
            <article class="interface">
              <activeinterest my-attr="<?php echo $username;?>"></activeinterest>
            </article>
        </section>
    </div><!-- end row fluid -->
</div>




