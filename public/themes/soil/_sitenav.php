<ul class="slogan list-inline">
    

    <?php if (!empty($current_user)) :?>
    <li>Hi <?php echo $current_user->username;?></li>
    <li <?php echo check_class('home'); ?>><a href="<?php echo site_url(); ?>" class="standout">Explore<?php //e(lang('bf_home')); ?></a></li>
    <li <?php echo check_method('profile'); ?>><a href="<?php echo site_url('users/profile'); ?>" class="standout">Account<?php //e(lang('bf_user_settings')); ?></a></li>
    <li><a href="<?php echo site_url('logout'); ?>" class="standout"><?php e(lang('bf_action_logout')); ?></a></li>
    <?php elseif (!empty($username)) : ?>
    <li>Hi <?php echo $username ;?></li>
    <li <?php echo check_class('home'); ?>><a href="<?php echo site_url(); ?>" class="standout">Explore<?php //e(lang('bf_home')); ?></a></li>
    <li <?php echo check_method('profile'); ?>><a href="<?php echo site_url('users/profile'); ?>" class="standout">Account<?php //e(lang('bf_user_settings')); ?></a></li>
    <li><a href="<?php echo site_url('logout'); ?>" class="standout"><?php e(lang('bf_action_logout')); ?></a></li>
    <?php else : ?>
    <li <?php echo check_class('home'); ?>><a href="<?php echo site_url(); ?>" class="standout">Explore<?php //e(lang('bf_home')); ?></a></li>
    <li><a href="<?php echo site_url(LOGIN_URL); ?>" class="standout">Sign In</a></li>
    <?php endif; ?>
</ul>
