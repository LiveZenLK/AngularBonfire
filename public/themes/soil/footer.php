
    <?php if ( ! isset($show) || $show == true) : ?>
<div class="wrapper">
  <header class="container">
    <div class="row fix-header-alignment"> 
    <div class="header">
      <div class="col-12 col-desktop-6">
        <h2 class="company-name">SOIL</h2>
        <h3 class="page-context"><span class="standout">code</span> test</h3>
      </div>
      <div class="col-12 col-desktop-6">
        <h1 class="slogan">Slogan goes <span class="standout">here</span></h1>
        <img src="img/logo.png" class="logo"/>
    </div><!-- end header -->
      </div>
    </div>
  </header>

  <section class="container">
    <div class="row">
      <nav class="col-12 col-desktop-3">
        <h3 class="nav-title">In this issue:</h3>
        <ul class="vertical-nav list-unstyled">
          <li class="active article-title"><a href="#">Article Title 1</a></li>
          <li class="active article-title"><a href="#">Article Title 2</a></li>
          <li class="active article-title"><a href="#">Article Title 3</a></li>
          <li class="active article-title"><a href="#">Article Title 4</a></li>
          <li class="active article-title"><a href="#">Article Title 5</a></li>
          <li class="active article-title"><a href="#">Article Title 6</a></li>
          <li class="active article-title"><a href="#">Article Title 7</a></li>
          <li class="active article-title"><a href="#">Article Title 8</a></li>
        </ul>
      </nav>



      <main class="col-12 col-desktop-9">
        <div class="home-page-image">

          <article class="current-article">
            <img src="img/hiviz.png" alt="Man in hi-viz vest"/>
            <!-- <div class="wrap-content"> -->
              <h1 class="article-title">Test article title</h1>
              <h4 class="article-author">By Joe Bloggs</h4>
              <hr/>
              <p class="article-intro">Etiam no ipsum nec tellus iaculis convallis. Nulla ac augue eget risus porttitor aliquest sed elementum neque. Pellentesque nibh nulla, interdum eget pellentesque eget, tempus sit amet ante.</p>
              <p class="article-paragraph">Integer nec sapien purus . Nulla non linero id tortor volutpat egestas no vitae risus. 
              Nullam aliquet porttitor massa, in pharetra est dapibus... <a href="test-article-title.php" alt="go to article">read the full article &gt;</a></p>
            <!-- </div> -->
          </article>
        
        </div>          
      </main>
    </div>
  </section>

  <aside class="container">
    <div class="row additional">
      <div class="col-12 col-desktop-3">
        <article class="should-be-a-link">
          <img src="img/co2.png" title="article title">
          <h1>Article title goes here</h1>
          <a href="test-article-title.php" alt="go to article">GO&gt;<span class="div-link-hack"></span></a>
        </article>
      </div>
      <div class="col-12 col-desktop-3">
        <article class="should-be-a-link">
          <img src="img/co2.png" title="article title">
          <h1>Article title goes here</h1>
          <a href="test-article-title.php" alt="go to article">GO&gt;<span class="div-link-hack"></span></a>
        </article>
      </div>
      <div class="col-12 col-desktop-3">
        <article class="should-be-a-link">
          <img src="img/co2.png" title="article title">
          <h1>Article title goes here</h1>
          <a href="test-article-title.php" alt="go to article">GO&gt;<span class="div-link-hack"></span></a>
        </article>
      </div>
      <div class="col-12 col-desktop-3">
        <article class="should-be-a-link">
          <img src="img/co2.png" title="article title">
          <h1>Article title goes here</h1>
          <a href="test-article-title.php" alt="go to article">GO&gt;<span class="div-link-hack"></span></a>
        </article>
      </div>
    </div>
  </aside>

<div class="footer">
  <footer class="container">





            <div class="row-fluid">
    <div class="col-desktop-3">
        <h4>Now with Angular JS</h4>

        <p>This fork adds a sitewide capability to the core module system, allowing you to use as much Angular as you need.</p>

        <p>Works seemlessly sideby side with existing php views and controllers. Also included is a simplified user registration process.</p>
    </div>

    <div class="col-desktop-3">
        <h4>A Solid Base</h4>

        <p>Bonfire is based on <a href="http://ellislab.com/codeigniter" target="_blank">CodeIgniter <?php echo CI_VERSION; ?></a>, a proven PHP framework. In order to make the best use of it, you should be comfortable with CodeIgniter and its <a href="http://ellislab.com/codeigniter/user-guide/" target="_blank">documentation</a> first.</p>

        <p>We use Twitter's <a href="">Bootstrap</a> front-end framework and <a href="http://jquery.com/">jQuery</a> as the basis of the CSS and Javascript.</p>
    </div>

<!-- </div>

<div class="row-fluid"> -->

    <div class="col-desktop-3">

        <h4>A Growing Community</h4>

        <hr/>
        <h4>A Growing Community</h4>
        <hr/>
        <h4>A Growing Community</h4>
        <hr/>
        <h4>A Growing Community</h4>
        <hr/>
        <h4>A Growing Community</h4>
    </div>
    <div class="col-desktop-3">
        <hr/>
        <h4>Built-in Flexibility</h4>

        <p>A <a href="https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc">modular system</a> that allows code re-use, and overriding core modules with custom modules.</p>

        <p>A <i>template system</i> that allows parent-child themes, and overriding controller views in the template.</p>

        <p><i>Role-Based Access Control</i> that provides as much fine-grained control as your modules need.</p>
    </div>

</div>
    <div class="row">
        <nav class="col-12 col-desktop-4">
          <h4 class="company-name">Powered by <a href="http://cibonfire.com" target="_blank">Bonfire <?php echo BONFIRE_VERSION; ?></a></h4>
        </nav>
        <main class="col-12 col-desktop-8">
          <nav class="footer-nav">
            <ul class="list-inline">
              <li><a href="#">Feedback</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </nav>
          <p class="copyright">&copy; 2011 Footer Text goes here</p>
        </main>
    </div>
  </footer>
</div><!-- end .footer -->

</div>
    <?php endif; ?>
	<div id="debug"><!-- Stores the Profiler Results --></div>
    <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
    <!-- // <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
    <script>window.jQuery || document.write('<script src="<?php echo js_path(); ?>jquery-1.7.2.min.js"><\/script>');</script>


    <script> var AngularBonfireUrl = '<?php echo site_url(); ?>' </script>
    <script> var csrfTokenName     = '<?php echo $this->security->get_csrf_token_name(); ?>' </script>
    <script> var csrfTokenValue    = '<?php echo $this->security->get_csrf_hash(); ?>' </script>
    <!-- // <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.js"></script> -->
    <script src="<?php echo js_path(); ?>angular.js"></script>
    <script src="<?php echo js_path(); ?>angular-ui-router.js"></script>
    <script src="<?php echo js_path(); ?>angular-animate.js"></script>
    <script src="<?php echo js_path(); ?>angular-bonfire.js"></script>
    <script src="<?php echo js_path(); ?>ng-account.js"></script>
    <script src="<?php echo js_path(); ?>ng-ability.js"></script>
    <script src="<?php echo js_path(); ?>ng-join.js"></script>
    <!-- // front end js -->
    <script src="<?php echo js_path(); ?>angular-bonfire.js"></script>


    <?php echo Assets::js(); ?>
</body>
</html>
