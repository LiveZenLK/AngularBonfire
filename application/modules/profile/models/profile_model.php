<?php
    class Profile_model extends MY_Model
    {

        // returns an array of a
        public function getAbilities($username){

            // get user abilties
            $sql = "SELECT name, description, rating, e.active 
                FROM bf_users e 
                LEFT JOIN bf_abilities t
                ON e.id=t.user_id
                where e.username = ?;";

            $query = $this->db->query($sql, array($username))->result(); 
            
            return $query;
        }
    }
