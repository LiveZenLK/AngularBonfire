<?php 
    class Account extends Front_Controller
    {

        public function __construct()
        {
            parent::__construct();

            Assets::add_js('codeigniter-csrf.js');

            $this->load->model('account_model');

        }

        //--------------------------------------------------------------------

        public function index()
        {

        }

        public function template() {

            $this->load->view('account/template');

        }

        public function ngaboutme() {

            $this->load->view('account/aboutme');

        }
        
        public function ngimage() {

            $this->load->view('account/image');

        }
        
        public function nglocation() {

            $this->load->view('account/location');

        }

        public function create(){

            $data = $data['form_data'];

            $mock_ability = array();     
            // // add current logged in user id to incoming data
            $mock_ability['user_id'] = $user_id;
            $mock_ability['location'] = 'Aberdeen, Scotland';
            $mock_ability['image_path'] = 'user-id-profile-image-0001.jpg';
            $mock_ability['account_profile'] = '#markdown -list -list -list';

            $outcome = $this->account_model->create($mock_ability);

            return $outcome;
        }

        public function update_account_profile(){

            $data = $this->input->post();
            $mock_ability = array();  

            $mock_ability['user_id'] = $this->current_user->id; ;
            $mock_ability['account_profile'] = $data['form_data'];

            $outcome = $this->ability_model->update($mock_ability);
            return $outcome;
        }

        // /* Will require a library or helper probably a helper */ //
        // public function update_image(){

        //     $data = $this->input->post();
        //     $data = $data['form_data'];

        //     $mock_ability = array();  
            
        //     $mock_ability['user_id'] = $this->current_user->id; ;
        //     $mock_ability['image_path'] = 'user-id-profile-image-0001.jpg';

        //     $outcome = $this->ability_model->add_ability($mock_ability);
        //     return $outcome;
        // }

        // /* To be done  later*/ //
        // public function update_location(){

        //     $data = $this->input->post();
        //     $mock_ability = array();  
            
        //     $mock_ability['user_id'] = $this->current_user->id; ;
        //     $mock_ability['location'] = $data['form_data'];;

        //     $outcome = $this->ability_model->add_ability($mock_ability);
        //     return $outcome;
        // }

    }