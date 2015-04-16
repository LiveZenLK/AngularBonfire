<?php

$validation_errors = validation_errors();
$errorClass = ' error';
$controlClass = 'span6';
$fieldData = array(
    'errorClass'    => $errorClass,
    'controlClass'  => $controlClass,
);

?>
<style>
p.already-registered {
    text-align: center;
}
</style>
<section id="register">
    <!-- <h1 class="page-header"><?php // echo lang('us_sign_up'); ?></h1> -->
    <?php //if ($validation_errors) : ?>
	<!-- <div class="alert alert-error fade in"> -->
		<?php //echo $validation_errors; ?>
	<!-- </div> -->
    <?php //endif; ?>
    <!-- <div class="alert alert-info fade in"> -->
        <!-- <h4 class="alert-heading"><?php //echo lang('bf_required_note'); ?></h4> -->
        <?php //if (isset($password_hints)) { echo $password_hints; } ?>
    <!-- </div> -->
    <div class="row-fluid">
        <div class="span12">
            <?php echo form_open( site_url(REGISTER_URL), array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>
				<?php //Template::block('user_fields', 'user_fields', $fieldData); ?>
				<?php /* /users/views/user_fields.php */

$currentMethod = $this->router->fetch_method();

$errorClass     = empty($errorClass) ? ' error' : $errorClass;
$controlClass   = empty($controlClass) ? 'span4' : $controlClass;
$registerClass  = $currentMethod == 'register' ? ' required' : '';
$editSettings   = $currentMethod == 'edit';

$defaultLanguage = isset($user->language) ? $user->language : strtolower(settings_item('language'));
$defaultTimezone = isset($current_user) ? $current_user->timezone : strtoupper(settings_item('site.default_user_timezone'));

?>
<div class="control-group<?php echo form_error('email') ? $errorClass : ''; ?>">
    <!-- <label class="control-label required" for="email"></label> -->
    <div class="cont rols">
        <input class="<?php echo $controlClass; ?>" placeholder="<?php echo lang('bf_email'); ?>" type="text" id="email" name="email" value="<?php echo set_value('email', isset($user) ? $user->email : ''); ?>" />
        <span class="help-inline"><?php echo form_error('email'); ?></span>
    </div>
</div>
<?php /*
<div class="control-group<?php echo form_error('display_name') ? $errorClass : ''; ?>">
    <label class="control-label" for="display_name"><?php echo lang('bf_display_name'); ?></label>
    <div class="controls">
        <input class="<?php echo $controlClass; ?>" type="text" id="display_name" name="display_name" value="<?php echo set_value('display_name', isset($user) ? $user->display_name : ''); ?>" />
        <span class="help-inline"><?php echo form_error('display_name'); ?></span>
    </div>
</div>
*/?>
<?php if (settings_item('auth.login_type') !== 'email' || settings_item('auth.use_usernames')) : ?>
<div class="control-group<?php echo form_error('username') ? $errorClass : ''; ?>">
    <!-- <label class="control-label required" for="username"></label> -->
    <div class="cont rols">
        <input class="<?php echo $controlClass; ?>" placeholder="<?php echo lang('bf_username'); ?>" type="text" id="username" name="username" value="<?php echo set_value('username', isset($user) ? $user->username : ''); ?>" />
        <span class="help-inline"><?php echo form_error('username'); ?></span>
    </div>
</div>
<?php endif; ?>
<div class="control-group<?php echo form_error('password') ? $errorClass : ''; ?>">
    <!-- // <label class="control-label<?php //echo $registerClass; ?>" for="password"></label> -->
    <div class="cont rols">
        <input class="<?php echo $controlClass; ?>" type="password" placeholder="<?php echo lang('bf_password'); ?>" id="password" name="password" value="" />
        <span class="help-inline"><?php echo form_error('password'); ?></span>
        <p class="help-block"><?php if (isset($password_hints)) { echo $password_hints; } ?></p>
    </div>
</div>
<?php /*
<div class="control-group<?php echo form_error('pass_confirm') ? $errorClass : ''; ?>">
    <label class="control-label<?php echo $registerClass; ?>" for="pass_confirm"><?php echo lang('bf_password_confirm'); ?></label>
    <div class="controls">
        <input class="<?php echo $controlClass; ?>" type="password" id="pass_confirm" name="pass_confirm" value="" />
        <span class="help-inline"><?php echo form_error('pass_confirm'); ?></span>
    </div>
</div>
*/?>
<?php if ($editSettings) : ?>
<div class="control-group<?php echo form_error('force_password_reset') ? $errorClass : ''; ?>">
    <div class="cont rols">
        <!-- <label class="checkbox" for="force_password_reset"> -->
            <input type="checkbox" id="force_password_reset" name="force_password_reset" value="1" <?php echo set_checkbox('force_password_reset', empty($user->force_password_reset)); ?> />
            <?php echo lang('us_force_password_reset'); ?>
        </label>
    </div>
</div>
<?php
endif;
/*
$hide = TRUE;
if ( ! empty($languages) && is_array($languages ) && !$hide) :
    if (count($languages) == 1) :
?>
<input type="hidden" id="language" name="language" value="<?php echo $languages[0]; ?>" />
<?php
    else :
?>
<div class="control-group<?php echo form_error('language') ? $errorClass : ''; ?>">
    <label class="control-label required" for="language"><?php echo lang('bf_language'); ?></label>
    <div class="controls">
        <select name="language" id="language" class="chzn-select <?php echo $controlClass; ?>">
            <?php foreach ($languages as $language) : ?>
            <option value="<?php e($language); ?>" <?php echo set_select('language', $language, $defaultLanguage == $language ? true : false); ?>>
                <?php e(ucfirst($language)); ?>
            </option>
            <?php endforeach; ?>
        </select>
        <span class="help-inline"><?php echo form_error('language'); ?></span>
    </div>
</div>
<?php
    endif;
endif;
?>
<div class="control-group<?php echo form_error('timezone') ? $errorClass : ''; ?>">
    <label class="control-label required" for="timezones"><?php echo lang('bf_timezone'); ?></label>
    <div class="controls">
        <?php echo timezone_menu(set_value('timezones', isset($user) ? $user->timezone : $defaultTimezone), $controlClass, 'timezones', array('id' => 'timezones')); ?>
        <span class="help-inline"><?php echo form_error('timezones'); ?></span>
    </div>
</div>*/?>
                <?php
                // Allow modules to render custom fields
                //Events::trigger('render_user_form');
                ?>
                <!-- Start of User Meta -->
                <?php //$this->load->view('users/user_meta', array('frontend_only' => true)); ?>
                <!-- End of User Meta -->
                <div class="control-group">
                    <div class="cont rols">
                        <input class="btn btn-primary" type="submit" name="register" id="submit" value="<?php echo lang('us_register'); ?>"  />
                    </div>
                </div>
            <?php echo form_close(); ?>
            <p class='already-registered'>
                <?php //echo lang('us_already_registered'); ?>
                <?php //echo anchor(LOGIN_URL, lang('bf_action_login')); ?>
            </p>
        </div>
    </div>
</section>