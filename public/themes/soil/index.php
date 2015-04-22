<?php echo theme_view('header'); ?>
<section class="container"><!-- Start of Main Container -->
    <?php

    // echo Template::message();
    echo isset($content) ? $content : Template::content();

    ?>
</section>
<?php echo theme_view('footer'); ?>