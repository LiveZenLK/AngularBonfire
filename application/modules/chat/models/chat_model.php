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
        	$sql = "SELECT u.username, sender_id, recipient_id, message, checked
                FROM bf_users u  
                LEFT JOIN bf_chat t 
                ON u.id=t.sender_id
                where t.recipient_id = ?;";

            $query = $this->db->query($sql, array($user_id))->result(); 

            // check for empty return value
            $query = array_filter($query);

			if (!empty($query)) {

            	return $query;
			}
			else {
				return FALSE;
			}
			            
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