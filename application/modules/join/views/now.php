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
    <label class="control-label required" for="email"><?php echo lang('bf_email'); ?></label>
    <div class="controls">
        <input class="<?php echo $controlClass; ?>" type="text" id="email" name="email" value="<?php echo set_value('email', isset($user) ? $user->email : ''); ?>" />
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
    <label class="control-label required" for="username"><?php echo lang('bf_username'); ?></label>
    <div class="controls">
        <input class="<?php echo $controlClass; ?>" type="text" id="username" name="username" value="<?php echo set_value('username', isset($user) ? $user->username : ''); ?>" />
        <span class="help-inline"><?php echo form_error('username'); ?></span>
    </div>
</div>
<?php endif; ?>
<div class="control-group<?php echo form_error('password') ? $errorClass : ''; ?>">
    <label class="control-label<?php echo $registerClass; ?>" for="password"><?php echo lang('bf_password'); ?></label>
    <div class="controls">
        <input class="<?php echo $controlClass; ?>" type="password" id="password" name="password" value="" />
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
    <div class="controls">
        <label class="checkbox" for="force_password_reset">
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
                    <div class="controls">
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


<!-- Click me: <input type="checkbox" ng-model="checked" aria-label="Toggle ngHide"/>
<br/>
<br/>
<br/>

<div class="fixed-for">
  <div class="check-element animate-show blah one thing-appearing" ng-show="checked">
    <h1>AngularBonfire</h1>
  </div>
  <div class="check-element animate-show blah two thing-appearing" ng-hide="checked">
    <h1>AngularBonfire</h1>
  </div>
</div>
 -->

<!-- 


<section ng-controller="NgJoinCtrl">
<div class="jumbotron"> -->
<!-- 	<div class="row top-section">
		<form role="form">
		<div class="col-sm-9">
			<input type="text" class="form-control" ng-model="skillData.newItem" id="inputUsername" ng-model="inputUsername" placeholder="Form Building">
		</div>
		<div class="col-sm-3">
			<button class="btn btn-success"  ng-submit="addItem()" ng-click="addItem()">Add</button>
		</div>
		</form>
	</div> -->
<!-- 	<article class="repeater" >
		<div class="row-fluid top-section">
			<div class="span10 ">
				<div class="edit-hidden thing-appearing animated" ng-hide="!editswitch">
					<input type="text" class="form-control" id="inputUsername" ng-model="inputUsername" placeholder="mknjhkhkhg">
				</div>
				<div class="thing-leaving animated" ng-hide="editswitch">name</div>
			</div>
			<div class="span2">
				<a ng-click="editswitch = !editswitch" class="edit">edit</a>
			</div>
		</div>
		<div class="edit-field" ng-hide="!editswitch">
			<textarea class="form-control" id="inputIntroduction" ng-model="inputIntroduction" placeholder="{{thing.tooltip}}" rows="4">{{thing.tooltip}}</textarea>
		</div>
	</article>
</div>
</section> 


-->


<?php /*
<div class="jumbotron lead-image " text-align="center" >
	<h1>AngularBonfire</h1>
	<div class="login thing-leaving animated" ng-hide="editswitch">

		<p class="lead">A New Way To Discover Conversations.</p>

		<?php if (isset($current_user->email)) : ?>
			<a href="<?php echo site_url(SITE_AREA) ?>" class="btn btn-large btn-success">Go to the Admin area</a>
		<?php else :?>
			<a href="<?php echo site_url(LOGIN_URL); ?>" class="btn btn-large btn-info">test@gmail.com : testtest</a>
			<a href="#" class="btn btn-large btn-success" ng-click="editswitch = !editswitch">register</a>
		<?php endif;?>
	</div>

	<!-- <br/><br/><a href="<?php echo site_url('/docs') ?>" class="btn btn-large btn-info">Browse the Docs</a> -->

	<section class="login thing-appearing animated" ng-hide="!editswitch">

			<p class="lead">A New Way To Discover Conversations.</p>

		<?php if (isset($current_user->email)) : ?>
			<a href="<?php echo site_url(SITE_AREA) ?>" class="btn btn-large btn-success">Go to the Admin area</a>
		<?php else :?>
			<a href="<?php echo site_url(LOGIN_URL); ?>" class="btn btn-large btn-info">test@gmail.com : testtest</a>
			<a href="#" class="btn btn-large btn-success" ng-click="editswitch = !editswitch">register</a>
		<?php endif;?>
	</section>

</div>
</section>
*/?>