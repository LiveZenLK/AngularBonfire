<?php 
    class Join extends Front_Controller
    {

    private $siteSettings;

    /**
     * Setup the required libraries etc.
     *
     * @retun void
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('users/user_model');

        $this->load->library('users/auth');


        $this->load->module("users");
        $this->users->lang->load('users');
        

        $this->siteSettings = $this->settings_lib->find_all();
        if ($this->siteSettings['auth.password_show_labels'] == 1) {
            Assets::add_module_js('users', 'password_strength.js');
            Assets::add_module_js('users', 'jquery.strength.js');
        }
    }

        //--------------------------------------------------------------------

        public function index($direction=FALSE)
        {

        }

        public function cta() {
            $this->load->view('join/cta');
        }

        public function now() {

                   // Are users allowed to register?
        // if (! $this->settings_lib->item('auth.allow_register')) {
            // Template::set_message(lang('us_register_disabled'), 'error');
            // Template::redirect('/');
        // }

        // $register_url = $this->input->post('register_url') ?: REGISTER_URL;
        // $login_url    = $this->input->post('login_url') ?: LOGIN_URL;

        // $this->load->model('roles/role_model');
        // $this->load->helper('date');

        // $this->load->config('address');
        // $this->load->helper('address');

        // $this->load->config('user_meta');
        // $meta_fields = config_item('user_meta_fields');
        // Template::set('meta_fields', $meta_fields);

        if (isset($_POST['register'])) {
            if ($userId = $this->saveUser('insert', 0, $meta_fields)) {
                // User Activation
                $activation = $this->user_model->set_activation($userId);
                $message = $activation['message'];
                $error   = $activation['error'];

                // Template::set_message($message, $error ? 'error' : 'success');

                log_activity($userId, lang('us_log_register'), 'users');
                // Template::redirect($login_url);

                    }

            // Template::set_message(lang('us_registration_fail'), 'error');
            // Don't redirect because validation errors will be lost.
                }

        if ($this->siteSettings['auth.password_show_labels'] == 1) {
            Assets::add_js(
                $this->load->view('users_js', array('settings' => $this->siteSettings), true),
                'inline'
            );
        }

        // Generate password hint messages.
        $this->user_model->password_hints();

            // echo 'now';
            $this->load->view('join/now');

        }
    }