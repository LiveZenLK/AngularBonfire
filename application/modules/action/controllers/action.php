<?php // SubHabit [Addaction]
    class Action extends Front_Controller
    {

        public function __construct()
        {
            parent::__construct();

            $this->load->helper(array('form', 'url'));

            $this->load->library('users/auth');
            $this->set_current_user();

            // $this->load->model('action_model');

            Assets::add_js('codeigniter-csrf.js');
             
        }

        //--------------------------------------------------------------------

        public function index($direction=FALSE)
        {

            $mock_action = array(
                // 'ability_id'  => 7000,
                // 'user_id'     => 2,
                // 'name'        => 'MongoDB', //paypal email address
                // 'description' => 'Used with express backend',   //paypal currency
                // 'ability'     => 3,    //location code (ex GB)
                // 'active'      => 1, //where to go back when the transaction is done.
            );
        }

        public function template(){

            Assets::add_module_js('action', 'ng-action.js');
            // Assets::add_module_css('action', 'action.css');
            $this->load->view('action/template');

        }

        // public function add($data=NULL){

        //     $mock_ability = json_decode($data);
        //     print_r($mock_ability);
        //     // $user_id = $this->current_user->id; 

        //     // // $mock_ability = array(
        //     //     // 'name'        => 'MongoDB', //paypal email address
        //     //     // 'description' => 'Used with express backend',   //paypal currency
        //     //     // 'rating'     => 3,    //location code (ex GB)
        //     //     // 'active'      => 1, //where to go back when the transaction is done.
        //     // // );
            
        //     // // add current logged in user id to incoming data
        //     // $mock_ability['user_id'] = $user_id;

        //     // $this->ability_model->add_ability($mock_ability);

        //     // // validations should go here
        //     // return true;

        //     // $this->load->view('ability/list');
        // }

        public function action_list(){

            $this->load->view('action/list');
        }

        public function interest(){

            // $this->load->view('action/interest');
            echo Modules::run('ability/ability_list', 1); 
        }

        // This function uses the details of the current logged in user
        // public function get_profile_abilites(){
            
        //     $user_id = $this->current_user->id; 
            
        //     $abilities = $this->ability_model->get_user_abilities($user_id);

        //     return $abilities;

        // }

        // // Kinda hacked together response to avoid using an external library
        // public function get_profile_abilites_json(){
            
        //     $user_id = $this->current_user->id; 
            
        //     $abilities = $this->ability_model->get_user_abilities($user_id);

        //     $abilities = json_encode($abilities);
        //     echo $abilities; die;
        // }

        // // example of function that accepts url params
        // public function get_public_abilites($user_id=NULL){

        //     // should really call a different method from above to filter out private abilities            
        //     $abilities = $this->ability_model->get_user_abilities($user_id);

        //     print_r($abilities);
        //     return $abilities;
        // }



    }