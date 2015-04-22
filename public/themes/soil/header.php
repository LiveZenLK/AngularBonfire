
<?php

Assets::add_css(array('base.css', 'soil.css'));

// Assets::add_js('bootstrap.min.js');

// $inline  = '$(".dropdown-toggle").dropdown();';
// $inline .= '$(".tooltips").tooltip();';
// Assets::add_js($inline, 'inline');

?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <title><?php
        echo isset($page_title) ? "{$page_title} : " : '';
        e(class_exists('Settings_lib') ? settings_item('site.title') : 'Bonfire');
    ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php e(isset($meta_description) ? $meta_description : ''); ?>">
    <meta name="author" content="<?php e(isset($meta_author) ? $meta_author : ''); ?>">
    <?php
    /* Modernizr is loaded before CSS so CSS can utilize its features */
    echo Assets::js('modernizr-2.5.3.js');
    ?>
    <?php echo Assets::css(); ?>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">
	<!-- <link href="<?php echo base_url(); ?>css/base.css"> -->
	<!-- <link href="<?php echo base_url(); ?>css/soil.css"> -->
</head>
<body ng-app="AngularBonfire">
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
<?php //echo theme_view('_sitenav');


