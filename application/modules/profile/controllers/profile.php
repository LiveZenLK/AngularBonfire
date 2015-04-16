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

        public function show($username=''){


            
            $abilities = $this->db->
                    where('user_id', $username)->
                    get('abilities')->result();

            $sql = "SELECT id FROM bf_users WHERE username = ?";

$query = $this->db->query($sql, array($username))->result(); 
$result = json_encode($query[0]);
print_r($result);


        }
        
        // public function show_all()
        // {

        // }
    }