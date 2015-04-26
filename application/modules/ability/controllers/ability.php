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

            Assets::add_js('codeigniter-csrf.js');
             
            // Assets::add_module_js('ability', 'ng-ability.js');
        }

                                    //--------------------------------------------------------------------

                                    // public function index($direction=FALSE)
                                    // {

                                        // $mock_ability = array(
                                            // 'ability_id'  => 7000,
                                            // 'user_id'     => 2,
                                            // 'name'        => 'MongoDB', //paypal email address
                                            // 'description' => 'Used with express backend',   //paypal currency
                                            // 'ability'     => 3,    //location code (ex GB)
                                            // 'active'      => 1, //where to go back when the transaction is done.
                                        // );
                                    // }

                                    // public function template(){

                                        // $this->load->view('ability/template');

                                    // }

        public function add(){

            // print_r($mock_ability);
            $user_id = $this->current_user->id; 

            // print_r($data);die;
            $data = $this->input->post();
            // $data = json_decode($data);
            $data = $data['form_data'];

            $mock_ability = array(
                'name'        => $data['name'], //paypal email address
                'description' => 'You have not added a description',   //paypal currency
                'rating'     => 3,    //location code (ex GB)
                'active'      => 1, //where to go back when the transaction is done.
            );
            
            // // add current logged in user id to incoming data
            $mock_ability['user_id'] = $user_id;

            $outcome = $this->ability_model->add_ability($mock_ability);

            // // validations should go here
            return $outcome;
        }

        public function update(){

            // print_r($mock_ability);
            $user_id = $this->current_user->id; 

            // print_r($data);die;
            $data = $this->input->post();
            // $data = json_decode($data);
            $data = $data['form_data'];
            $id   = $data['item_ref'];

            $mock_ability = array(
                'name'        => $data['name'], //paypal email address
                'description' => $data['description'],   //paypal currency
            );
            
            // // add current logged in user id to incoming data
            $mock_ability['user_id']    = $user_id;
            $mock_ability['ability_id'] = $id;

            $outcome = $this->ability_model->update_ability($mock_ability);

            // // validations should go here
            return $outcome;
        }


        public function nglist(){
 
            $this->load->view('ability/list');
        }

        public function ngactions(){

            $this->load->view('ability/actions');
        }

        public function ngstatus(){

            $this->load->view('ability/status');
        }

                            // This function uses the details of the current logged in user
                            // public function get_profile_abilites(){
                                
                            //     $user_id = $this->current_user->id; 
                                
                            //     $abilities = $this->ability_model->get_user_abilities($user_id);

                            //     return $abilities;

                            // }

        // Kinda hacked together response to avoid using an external library
        public function get_profile_abilites_json(){
            
            $user_id = $this->current_user->id; 
            
            $abilities = $this->ability_model->get_user_abilities($user_id);

            $abilities = json_encode($abilities);
            echo $abilities; die;
        }

        // public function get_username_abilites($username){
            
        //     $user_id = $this->current_user->id; 
            
        //     $abilities = $this->ability_model->get_user_abilities($user_id);

        //     $abilities = json_encode($abilities);
        //     echo $abilities; die;
        // }
    }