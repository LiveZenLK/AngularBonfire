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


            // get user abilties
            $sql = "SELECT name, description, rating, e.active 
                FROM bf_users e 
                LEFT JOIN bf_abilities t
                ON e.id=t.user_id
                where e.username = ?;";

            $query = $this->db->query($sql, array($username))->result(); 
            $abilities = json_encode($query);
            print_r($abilities);


        }
        
        // public function show_all()
        // {

        // }
    }