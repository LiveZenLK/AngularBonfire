<?php 
    class Profile extends Front_Controller
    {

        public function __construct()
        {
            parent::__construct();

            $this->load->model('users/user_model');
            $this->load->model('profile/profile_model');
        }

        public function index()
        {
            //throw error code
        }


        // si.te/profile/$username
        public function show($username='testtest'){ // doesn't really accept arguments
            $this->set_current_user();
        // echo $username; die;

            $abilities = $this->getAbilities($username);
            // $abilities = json_encode($abilities);

            // print_r($abilities);
            /*//AJAX VIEW
            // $viewdata = array('abilities' => $abilities);
            // $this->load->view('profile/profile', $viewdata);
            */
            Template::set('username', $username);
            Template::set('abilities', $abilities);

            Template::set_view('profile');
            Template::render();
        }

        public function getAbilitiesJson($username)
        {
            $abilities = $this->profile_model->getAbilities($username);
            $data = json_encode($abilities);
            echo $data;die;
            // return $data;
        }

        public function getProfileJson($username)
        {
            $abilities = $this->profile_model->getProfile($username);
            $data = json_encode($abilities);
            echo $data;die;
            // return $data;
        }

        public function widget(){
            $viewdata = array('data' => 'hello widget');
            $this->load->view('profile/widget', $viewdata);
        }


        // should be moved to the model where it can be tested
        private function getAbilities($username){

            // get user abilties
            $sql = "SELECT name, description, rating, e.active 
                FROM bf_users e 
                LEFT JOIN bf_abilities t
                ON e.id=t.user_id
                where e.username = ?;";

            $query = $this->db->query($sql, array($username))->result(); 
            
            return $query;
        }

    }