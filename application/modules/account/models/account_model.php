<?php
    class Account_model extends MY_Model
    {

        protected $table_name   = 'account';
        protected $key          = 'account_id';
        protected $set_created  = true;
        protected $set_modified = true;
        protected $soft_deletes = true;
        protected $date_format  = 'datetime';

        /** @var array Validation rules. */
        protected $validation_rules = array(
            array(
                'field' => 'account_profile',
                'label' => 'account_profile',
                'rules' => 'max_length[250]', 
            ),
            array(
                'field' => 'location',
                'label' => 'location',
                'rules' => 'max_length[120]',
            ),
            array(
                'field' => 'image_path',
                'label' => 'image_path',
                'rules' => 'max_length[120]', 
            ),
            array(
                'field' => 'active',
                'label' => 'ability_active',
                'rules' => 'max_length[1]', 
            ),
        );

        // Accepts an array 
        public function create_user_account($user_id=NULL) {

            $mock_data = array();     
            // // add current logged in user id to incoming data
            $mock_data['user_id'] = $user_id;
            $mock_data['location'] = 'Aberdeen, Scotland';
            $mock_data['image_path'] = 'user-id-profile-image-0001.jpg';
            $mock_data['account_profile'] = '#markdown -list -list -list';

            
            $this->db->insert('account', $mock_data); 
            
            return true;

        }

        // // Returns the account data for a given user id
        public function get_user_account($user_id=NULL) {
            
            $account = $this->db->
                    where('user_id', $user_id)->
                    get('account')->result();

            return $account;

        }

        // public function update_image($data=NULL){

        // }

        // public function update_user_profile($data=NULL){

        // }

        // public function update_user_profile($data=NULL){

        // }

}
