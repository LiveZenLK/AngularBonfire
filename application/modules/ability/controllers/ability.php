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

        public function show(){
              $data = array();
              $data['abilities'] = $this->get_private_abilites();
            $this->load->view('ability/show', $data);
            Assets::add_module_js('ability', 'ng-ability.js');
            // include_once()
            // Template::render();
        }

        public function ngpartial(){

            $this->load->view('ability/ngpartial');
        }

        // This function uses the details of the current logged in user
        public function get_private_abilites(){
            
            $user_id = $this->current_user->id; 
            
            $abilities = $this->ability_model->get_user_abilities($user_id);

            return $abilities;
        }

        // This function uses the details of the current logged in user
        public function get_private_abilites_json(){
            
            $user_id = $this->current_user->id; 
            
            $abilities = $this->ability_model->get_user_abilities($user_id);

            $abilities = json_encode($abilities);
            return $abilities;
        }

        // example of function that accepts url params
        public function get_public_abilites($user_id=NULL){

            // should really call a different method from above to filter out private abilities            
            $abilities = $this->ability_model->get_user_abilities($user_id);

            print_r($abilities);
            return $abilities;
        }



    }