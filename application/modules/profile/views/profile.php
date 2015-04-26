  <section class="container">
    <div class="row">
      <nav class="col-12 col-desktop-3">
        <h3 class="na v-title"><?php echo $username;?>'s Interests</h3>
<!--         <ul ng-controller="ProfileInterestCtrl" class="vertical-nav list-unstyled">
            <li  ng-repeat="list in stuff track by $index"><a href="#" ng-click="doStuff($index)">{{list.name}}</a></li>
        </ul>  --> 
        <?php echo Modules::run('profile/widget', 1); ?>

        <interestlist my-attr="<?php echo $username;?>"></interestlist>

      </nav>
      <main class="col-12 col-desktop-9">
        <div class="home-page-image">
          <hr/>
          <activeinterest my-attr="<?php echo $username;?>"></activeinterest>
          <hr/>
          <article class="current-article">
              <img src="img/hiviz.png" alt="Man in hi-viz vest"/>
              <div class="wrap-content">
                <h1 class="article-title">Test article title</h1>
                <h4 class="article-author">By Joe Bloggs</h4>
                <hr/>
                <p class="article-intro">Etiam no ipsum nec tellus iaculis convallis. Nulla ac augue eget risus porttitor aliquest sed elementum neque. Pellentesque nibh nulla, interdum eget pellentesque eget, tempus sit amet ante.</p>
                <p class="article-paragraph">Integer nec sapien purus . Nulla non linero id tortor volutpat egestas no vitae risus. 
                Nullam aliquet porttitor massa, in pharetra est dapibus... <a href="test-article-title.php" alt="go to article">read the full article &gt;</a></p>
              </div>
          </article>
        </div>          
      </main>
    </div>
  </section>




