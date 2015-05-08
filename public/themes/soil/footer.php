
    <?php if ( ! isset($show) || $show == true) : ?>




<!--   <aside class="container minimal-modern">
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
  </aside> -->

<div class="footer">
  <footer class="container">





            <div class="row -fluid">
    <div class="col-desktop-3">
        <h4>Now with Angular JS</h4>

        <p>This fork adds a sitewide capability to the core module system, allowing you to use as much Angular as you need.</p>

        <p>Works seemlessly sideby side with existing php views and controllers. Also included is a simplified user registration process.</p>
    </div>

<!--     <div class="col-desktop-3">
        <h4>A Solid Base</h4>

        <p>Bonfire is based on <a href="http://ellislab.com/codeigniter" target="_blank">CodeIgniter <?php //echo CI_VERSION; ?></a>, a proven PHP framework. In order to make the best use of it, you should be comfortable with CodeIgniter and its <a href="http://ellislab.com/codeigniter/user-guide/" target="_blank">documentation</a> first.</p>

        <p>We use Twitter's <a href="">Bootstrap</a> front-end framework and <a href="http://jquery.com/">jQuery</a> as the basis of the CSS and Javascript.</p>
    </div> -->

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
    <div class="col-desktop-6">
        <hr/>
        <h4>Built-in Flexibility</h4>

        <p>Due to some bug inherent in my architecture which was possibly inherited from the previous dev team (Mum and Dad), or somewhere during a sprint in my early lifecycle I am completely unable to self edit. That is to say I am a highly capable editor, but whenever I fall into the trap of self editing I get stuck in a infinate loop of refining the minuate of details, or like looking up words in the dictorionary. This means in five years as a developer I have never managed to get more than two articles into a blog. That and I have never really felt like i have useful opinion on anything before. So this time round I'm just writing as I go, all mistakes are my own, all errors are learning tools for the reader, and hoping that it's useful for someone. </p>
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
    <!-- // <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.js"></script> -->
    <!--<script src="<?php //echo js_path(); ?>angular.js"></script>
    <script src="<?php //echo js_path(); ?>angular-ui-router.js"></script>
    <script src="<?php //echo js_path(); ?>angular-animate.js"></script>
    <script src="<?php //echo js_path(); ?>angular-bonfire.js"></script>
    <script src="<?php //echo js_path(); ?>ng-account.js"></script>
    <script src="<?php //echo js_path(); ?>ng-ability.js"></script>
    <script src="<?php //echo js_path(); ?>ng-join.js"></script>
     // front end js 
    
    <script src="<?php //echo js_path(); ?>angular-bonfire.js"></script>
        // <script src="<?php //echo site_url(); ?>/js/angular-bonfire.js"></script>
     -->

<?php Assets::add_js(array('angular-bonfire.js'));?>

    <?php echo Assets::js(); ?>
</body>
</html>
