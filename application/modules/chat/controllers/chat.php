<?php 
    class Chat extends Front_Controller
    {

        public function __construct()
        {
            parent::__construct();

            $this->load->model('chat/chat_model');
            // $this->load->model('profile/profile_model');
            $this->load->library('users/auth');
            $this->set_current_user();

            Assets::add_js('codeigniter-csrf.js');
        }

        public function index()
        {
            //throw error code
            echo 'ddom';
        }


        // // si.te/profile/$username
        // public function show($username='testtest'){ // doesn't really accept arguments
        // // echo $username; die;

        //     $abilities = $this->getAbilities($username);
        //     // $abilities = json_encode($abilities);

        //     // print_r($abilities);
        //     //AJAX VIEW
        //     // $viewdata = array('abilities' => $abilities);
        //     // $this->load->view('profile/profile', $viewdata);
            
        //     Template::set('username', $username);
        //     Template::set('abilities', $abilities);

        //     Template::set_view('profile');
        //     Template::render();
        // }

        // public function getAbilitiesJson($username)
        // {
        //     $abilities = $this->profile_model->getAbilities($username);
        //     $data = json_encode($abilities);
        //     echo $data;die;
        //     // return $data;
        // }
        public function inbox($username=NULL){
                // $current_user = $this->current_user->id;
                // $viewdata = array('data' => 'hello widget');
                // $viewdata = array('username' => $username );
                // $viewdata = array('current_user' => $current_user );
                $this->load->view('inbox');//, $viewdata);
        }
        public function reply(){
                // $current_user = $this->current_user->id;
                // $viewdata = array('data' => 'hello widget');
                // $viewdata = array('username' => $username );
                // $viewdata = array('current_user' => $current_user );
                $this->load->view('reply');//, $viewdata);
        }

        public function widget($username=NULL){
                if(isset($this->current_user->id)){
                    $current_user = $this->current_user->id;
                }else{
                    $current_user = FALSE;
                }
                $viewdata = array('data' => 'hello widget');
                $viewdata = array('username' => $username );
                $viewdata = array('current_user' => $current_user );
                $this->load->view('widget', $viewdata);
        }
        
        public function all_messages(){

            $messages = $this->chat_model->get_messages($this->current_user->id );
            echo json_encode($messages);die;
        }
        // api/chat/sendmessage
        public function send_message(){
            // get the data from the http POST
            $data = $this->input->post();
            // and seperate out the form data 
            $form_data = $data['form_data'];
            
            // using the inbuilt auth library loaded in the constructer
            $sender_id = $this->current_user->id; 

            // uses a native php function to record the data/time
            $timestamp = time();

            $mock_message = array(
                'sender_id'    =>  $sender_id,   
                'recipient_id' => $form_data['recipient_id'],
                'message'      => $form_data['message'],
                'timestamp'     => $timestamp,
                'checked'      => 0
            );

            $outcome = $this->chat_model->create_message($mock_message);

            echo $outcome;die;  // we could use this for error messages on the front end
        }

        public function send_reply(){
            // get the data from the http POST
            $data = $this->input->post();
        print_r($data);die;
            // and seperate out the form data 
            $form_data = $data['form_data'];
            
            // using the inbuilt auth library loaded in the constructer
            $sender_id = $this->current_user->id; 

            // uses a native php function to record the data/time
            $timestamp = time();

            $mock_message = array(
                'sender_id'    =>  $sender_id,   
                'recipient_id' => $form_data['recipient'],
                'message'      => $form_data['message'],
                'timestamp'     => $timestamp,
                'checked'      => 0
            );

            $outcome = $this->chat_model->create_message($mock_message);

            echo $outcome;die;  // we could use this for error messages on the front end
        }


        // // should be moved to the model where it can be tested
        // private function getAbilities($username){

        //     // get user abilties
        //     $sql = "SELECT name, description, rating, e.active 
        //         FROM bf_users e 
        //         LEFT JOIN bf_abilities t
        //         ON e.id=t.user_id
        //         where e.username = ?;";

        //     $query = $this->db->query($sql, array($username))->result(); 
            
        //     return $query;
        // }

    }