<?php
	class Chat_model extends MY_Model
    {

        protected $table_name   = 'chat';
        protected $key          = 'chat_id';
	
	
        public function create_message($data=NULL)
        {
        	// do substitution username for userid in case user changes name
        	$abilities = $this->db->
                    where('username', $data['recipient_id'])->
                    get('users')->result();

            $foo = $abilities[0];

            $data['recipient_id'] = $foo->id;


            $this->db->insert('chat', $data); 
            
            return true;

        }

        public function get_messages($user_id=NULL)
        {

        	$messages = $this->db->
                    where('username', $user_id)->
                    get('chat')->result();

            return $messages;
        }

        public function get_new_message($username)
        {

        	// do substitution username for userid in case user changes name
        	$message = $this->db->
                    where('username', $data['recipient_id'])->
                    get('users')->result();

            $foo = $abilities[0];

            $data['recipient_id'] = $foo->id;


            $this->db->insert('chat', $data); 
            
            return true;
        }
        
}