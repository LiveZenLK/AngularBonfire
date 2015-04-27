<ul class="slogan list-inline">
    <li <?php echo check_class('home'); ?>><a href="<?php echo site_url(); ?>" class="standout"><?php e(lang('bf_home')); ?></a></li>
    <?php if (empty($current_user)) : ?>
    <li><a href="<?php echo site_url(LOGIN_URL); ?>" class="standout">Sign In</a></li>
    <?php else : ?>
    <li <?php echo check_method('profile'); ?>><a href="<?php echo site_url('users/profile'); ?>" class="standout"><?php e(lang('bf_user_settings')); ?></a></li>
    <li><a href="<?php echo site_url('logout'); ?>" class="standout"><?php e(lang('bf_action_logout')); ?></a></li>
    <?php endif; ?>
</ul>
