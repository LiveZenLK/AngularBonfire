<?php 
    class Account extends Front_Controller
    {

        public function __construct()
        {
            parent::__construct();

            Assets::add_js('codeigniter-csrf.js');

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
    }