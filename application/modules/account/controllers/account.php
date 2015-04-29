<?php 
    class Account extends Front_Controller
    {

        public function __construct()
        {
            parent::__construct();

            Assets::add_js('codeigniter-csrf.js');

            $this->load->model('account_model');

            $this->load->library('users/auth');
            $this->set_current_user();

            $this->load->helper(array('form', 'url'));

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

        // called from users/controllers/user.php->register()
        public function update_account_profile(){

            $data = $this->input->post();
            $mock_ability = array();  

            $mock_ability['user_id'] = $this->current_user->id; ;
            $mock_ability['account_profile'] = $data['form_data'];

            $outcome = $this->ability_model->update($mock_ability);
            return $outcome;
        }

        public function show(){

            $user_id = $this->current_user->id;

            $data = $this->account_model->get_user_account($user_id);

            $data = json_encode($data);
            echo $data; die;
        }

        function do_upload($field = 'userfile')
        {
        
            $config['upload_path'] = APPPATH.'../public/assets/images';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2500';
            $config['max_width']  = '400';
            $config['max_height']  = '600';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload())
            {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);die;
            }
            else
            {
                $data = $this->upload->data();
                $user_id = $this->current_user->id;

                $this->account_model->update_image($data['file_name'], $user_id);
                print_r($data);die;
            }
        }

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