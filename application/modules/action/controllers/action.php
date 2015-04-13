<?php // SubHabit [Addaction]
    class Action extends Front_Controller
    {

        public function __construct()
        {
            parent::__construct();

        }

        //--------------------------------------------------------------------

        public function index($direction=FALSE)
        {

        }

        public function template() {

            $this->load->view('action/template');

        }
    }