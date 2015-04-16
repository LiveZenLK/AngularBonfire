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

            $sql = "SELECT id userid FROM bf_users WHERE username = ? JOIN";

            $this->db->select('u.id userid');
            $this->db->from('users u');
            // $this->db->join('topics t', 't.user_id = u.user_id'); // this joins the user table to topics
            // $this->db->join('quotes q', 'q.topic_id = t.topic_id'); // this joins the quote table to the topics table
            $query = $this->db->get()->result();

            // $query = $this->db->query($sql, array($username))->result(); 
            $result = json_encode($query[0]);
            print_r($result);


        }
        
        // public function show_all()
        // {

        // }
    }