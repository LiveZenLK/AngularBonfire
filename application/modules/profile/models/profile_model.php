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

        public function getProfile($username){

            // get user abilties
            $sql = " SELECT user_id, account_profile, location, image_path 
                FROM bf_users e 
                LEFT JOIN bf_account t
                ON e.id=t.user_id
                where e.username = ?;";

            $query = $this->db->query($sql, array($username))->result(); 
            
            return $query[0];
        }
    }
