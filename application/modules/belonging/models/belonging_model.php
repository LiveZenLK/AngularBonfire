<?php
    class Belonging_model extends MY_Model
    {

        protected $table_name   = 'belongings';
        protected $key          = 'belonging_id';
        protected $set_created  = true;
        protected $set_modified = true;
        protected $soft_deletes = true;
        protected $date_format  = 'datetime';

        /** @var array Validation rules. */

        public function get_all_by_user($user_id=NULL) {
            
            $belongings = $this->db->
                    where('user_id', $user_id)->
                    get('belongings')->result();

            return $belongings;

        }

        public function get_all_by_name($id=NULL){

            $belongings = $this->db->
                    where('belonging_id', $id)->
                    get('belongings')->result();

            return $belongings;
        }
}

