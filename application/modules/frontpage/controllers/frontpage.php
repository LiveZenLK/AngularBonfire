<?php 
    class Frontpage extends Front_Controller
    {

        public function __construct()
        {
            parent::__construct();

            Assets::add_js('codeigniter-csrf.js');

            $this->load->model('frontpage_model');

            $this->load->library('users/auth');
            $this->set_current_user();

            $this->load->helper(array('form', 'url'));

        }

        //--------------------------------------------------------------------

        public function index()
        {

        }

        public function template() {

            $this->load->view('frontpage/template');

        }

        // called from users/controllers/user.php->register()
        // public function update_account_profile(){
        //     $data = $this->input->post();
        //     $user_id = $this->current_user->id; ;
        //     $outcome = $this->account_model->update_account_profile($data['account_profile'], $user_id);
        //     return $outcome;
        // }

        // // called from users/controllers/user.php->register()
        // public function update_account_location(){
        //     $data = $this->input->post();
        //     $user_id = $this->current_user->id; 
        //     // print_r($data['location']);die;
        //     $outcome = $this->account_model->update_account_location($data['location'], $user_id);
        //     return $outcome;
        // }





        // public function show(){

        //     $user_id = $this->current_user->id;

        //     $data = $this->account_model->get_user_account($user_id);

        //     $data = json_encode($data);
        //     echo $data; die;
        // }
}