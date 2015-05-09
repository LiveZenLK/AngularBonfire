<?php
    class Frontpage_model extends MY_Model
    {

        public function get_stuff(){
            $sql ="
            SELECT name, user_id, username
            FROM bf_abilities a
            join bf_users u 
                on u.id = a.user_id";
            $result = array();
            $query = $this->db->query($sql)->result();
            $res = [];
            foreach($query as $key => $value)
            {
                if(!isset($res[$value->user_id]['username'])){
                    $res[$value->user_id]['username'] = $value->username;
                }
                $res[$value->user_id]['skills'][] = array('name' => $value->name);
            }
            foreach ($res as $key => $value) {

                array_push($result, $value);
            }
            return $result;
        }
    }