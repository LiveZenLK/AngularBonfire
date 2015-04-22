<?php 
    class Profile extends Front_Controller
    {

        public function __construct()
        {
            parent::__construct();

            $this->load->model('users/user_model');


        }

        public function index($profile=FALSE)
        {
            echo 'thign';
            die;

        }


        // si.te/profile/$username
        public function show($username='testtest'){ // doesn't really accept arguments
        // echo $username; die;
            // totally should be in a modal except I believe that not to be agile
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

        public function widget(){
            $viewdata = array('data' => 'hello widget');
            $this->load->view('profile/widget', $viewdata);
        }

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