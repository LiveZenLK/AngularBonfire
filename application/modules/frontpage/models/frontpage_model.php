<?php
    class Frontpage_model extends MY_Model
    {

        // Accepts an array 
        public function thing() {
        	return 'works';
            // $mock_data = array();     
            // // // add current logged in user id to incoming data
            // $mock_data['user_id'] = $user_id;
            // $mock_data['location'] = 'Aberdeen, Scotland';
            // $mock_data['image_path'] = 'user-id-profile-image-0001.jpg';
            // $mock_data['account_profile'] = '#markdown -list -list -list';

            
            // $this->db->insert('account', $mock_data); 
            
            // return true;

        }
        public function get_stuff(){
            $sql ="
            SELECT name, user_id, username
            FROM bf_abilities a
            join bf_users u 
                on u.id = a.user_id";
            $result = array();
            $query = $this->db->query($sql)->result();
                // echo'<pre>'; print_r($query);echo'</pre>';die;
            $res = [];
            foreach($query as $key => $value)
            {
                // echo $value->name;
                if(!isset($res[$value->user_id]['username'])){
                // echo $value->user_id;
                // echo $value->username;
                    // echo 'count<br/>';
                    $res[$value->user_id]['username'] = $value->username;
                }
                $res[$value->user_id]['skills'][] = array('name' => $value->name);


                // array_push($res[$value->user_id]['skills'], $value->name);
            }
            echo'<pre>';print_r($res);echo'</pre>';die;
            foreach ($res as $key => $value) {

                array_push($result, $value);
            }
            // echo'<pre>';print_r(json_encode($result));echo'</pre>';
            // $array =  (array) $res;d
            return $result;
            // die;
        }
    }