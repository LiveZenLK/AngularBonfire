    <?php if ( ! isset($show) || $show == true) : ?>
    <hr />
    <footer class="footer footer-container">
        <div class="container">
        <div class="row-fluid">
    <div class="span3">
        <h4>Now with Angular JS</h4>

        <p>This fork adds a sitewide capability to the core module system, allowing you to use as much Angular as you need.</p>

        <p>Works seemlessly sideby side with existing php views and controllers. Also included is a simplified user registration process.</p>
    </div>

    <div class="span3">
        <h4>A Solid Base</h4>

        <p>Bonfire is based on <a href="http://ellislab.com/codeigniter" target="_blank">CodeIgniter <?php echo CI_VERSION; ?></a>, a proven PHP framework. In order to make the best use of it, you should be comfortable with CodeIgniter and its <a href="http://ellislab.com/codeigniter/user-guide/" target="_blank">documentation</a> first.</p>

        <p>We use Twitter's <a href="">Bootstrap</a> front-end framework and <a href="http://jquery.com/">jQuery</a> as the basis of the CSS and Javascript.</p>
    </div>

<!-- </div>

<div class="row-fluid"> -->

    <div class="span3">

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
    <div class="span3">
        <hr/>
        <h4>Built-in Flexibility</h4>

        <p>A <a href="https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc">modular system</a> that allows code re-use, and overriding core modules with custom modules.</p>

        <p>A <i>template system</i> that allows parent-child themes, and overriding controller views in the template.</p>

        <p><i>Role-Based Access Control</i> that provides as much fine-grained control as your modules need.</p>
    </div>

</div>
            <p>Powered by <a href="http://cibonfire.com" target="_blank">Bonfire <?php echo BONFIRE_VERSION; ?></a></p>
        </div>
    </footer>
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
    <script src="<?php echo js_path(); ?>ng-action.js"></script>
    <script src="<?php echo js_path(); ?>ng-ability.js"></script>
    <script src="<?php echo js_path(); ?>ng-join.js"></script>
    <script src="<?php echo js_path(); ?>level/test.js"></script>


    <?php echo Assets::js(); ?>
</body>
</html>