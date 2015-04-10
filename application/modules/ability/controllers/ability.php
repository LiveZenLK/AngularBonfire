<?php // Tensile Chess
    class Ability extends Front_Controller
    {

        public function __construct()
        {
            parent::__construct();

            $this->load->helper(array('form', 'url'));

            $this->load->library('users/auth');
            $this->set_current_user();

            $this->load->model('ability_model');
             
        }

        //--------------------------------------------------------------------

        public function index($direction=FALSE)
        {

            // Assets::add_css('rake-space.css');
            // Assets::add_module_js('piece', 'user-management.js');
            $mock_ability = array(
                'ability_id'  => 7000,
                'user_id'     => 2,
                'name'        => 'MongoDB', //paypal email address
                'description' => 'Used with express backend',   //paypal currency
                'ability'     => 3,    //location code (ex GB)
                'active'      => 1, //where to go back when the transaction is done.
            );

            $abilities = array();

            array_push($abilities, $mock_ability);
            // Template::set('abilities', $abilities);
            print_r($abilities);
            // print_r($user_id);
            // Template::set('user', $user);
            // Template::render();
        }

        public function get_all(){
            
            $user_id = $this->current_user->id; 
            
            $abilities = $this->ability_model->dostuff($user_id);

            print_r($abilities);
            return $abilities;
        }


    }