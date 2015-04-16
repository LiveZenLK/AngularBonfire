<?php

$validation_errors = validation_errors();
$errorClass = ' error';
$controlClass = 'span6';
$fieldData = array(
    'errorClass'    => $errorClass,
    'controlClass'  => $controlClass,
);

?>
<section id="profile">
<?php /*
<!-- <!-- <!-- <!-- <!-- <!-- <!-- <!-- <!-- <!-- <!-- <!-- <!-- <!-- <!-- 	<h1 class="page-header"><?php echo lang('us_edit_profile'); ?></h1>
    <?php if ($validation_errors) : ?>
    <div class="alert alert-error">
        <?php echo $validation_errors; ?>
    </div>
    <?php endif; ?>
    <?php if (isset($user) && $user->role_name == 'Banned') : ?>
    <div data-dismiss="alert" class="alert alert-error">
        <?php echo lang('us_banned_admin_note'); ?>
    <?php endif; ?>
    </div>
    <div class="alert alert-info">
        <h4 class="alert-heading"><?php echo lang('bf_required_note'); ?></h4>
        <?php if (isset($password_hints)) { echo $password_hints; } ?>
    </div> --> --> --> --> --> --> --> --> --> --> --> --> --> --> -->
*/?>
    <div class="row-fluid">
        <div class="span12">

            <!-- // Load the Account section routing module -->
            <?php echo Modules::run('account/template', 1); ?>
        </div>

    </div>
<?php /*
    <div class="row-fluid">
        <div class="span12">
            <?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal', 'autocomplete' => 'off')); ?>
                <div class="form-actions">
                <?php Template::block('user_fields', 'user_fields', $fieldData); ?>
                <?php
                // Allow modules to render custom fields
                Events::trigger('render_user_form', $user );
                ?>
                <!-- Start User Meta -->
                <?php $this->load->view('users/user_meta', array('frontend_only' => true));?>
                <!-- End of User Meta -->
                    <input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('bf_action_save') . ' ' . lang('bf_user'); ?>" />
                    <?php echo lang('bf_or') . ' ' . anchor('/', lang('bf_action_cancel')); ?>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
*/?>
</section>