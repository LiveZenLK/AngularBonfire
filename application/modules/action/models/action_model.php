<?php
//     class Ability_model extends MY_Model
//     {

//         protected $table_name   = 'abilities';
//         protected $key          = 'ability_id';
//         protected $set_created  = true;
//         protected $set_modified = true;
//         protected $soft_deletes = true;
//         protected $date_format  = 'datetime';

//         /** @var array Validation rules. */
//         protected $validation_rules = array(
//             array(
//                 'field' => 'name',
//                 'label' => 'ability_name',
//                 'rules' => 'max_length[60]', // Chess
//             ),
//             array(
//                 'field' => 'description',
//                 'label' => 'ability_description',
//                 'rules' => 'max_length[120]', // Enjoy, can't strategise
//             ),
//             array(
//                 'field' => 'rating',
//                 'label' => 'ability_rating',
//                 'rules' => 'max_length[1]', // 1 -5
//             ),
//             array(
//                 'field' => 'active',
//                 'label' => 'ability_active',
//                 'rules' => 'max_length[1]', // true 1 false 0
//             ),
//         );

//         public function get_user_abilities($user_id=NULL) {
            
//             $abilities = $this->db->
//                     where('user_id', $user_id)->
//                     get('abilities')->result();

//             return $abilities;

//         }

//         public function add_ability($data=NULL){

//             $this->db->insert('abilities', $data); 
//             // print_r($data);die;

//         }



// }




    // public function update_ability(){

    // }

    // public function delete_ability(){

    // }

    // public function get_abilities($user_id){
        
    //  $abilities = $this->db->
    //             where('user_id', $user_id)->
    //             get('abilites')->result();
        
    //  return $abilities;
    // }
    // // public function update_rating(){
    //  // totally different module altogther
    // // }

    // public function change_status($ability_id=NULL, $status=0){
    //  if ($status == 0)
    //         $this->db->where('user_id', $user_id)->
    //                 update('tickets', array('NoOfTickets'=>$remainingTickets));
    //      abilty_active 
                        

    //         $remainingTickets = $tickets[0];
    //         $remainingTickets = $remainingTickets->NoOfTickets;
    //         // NoOfTickets;

    //         // print_r($remainingTickets);
            
    //         if($remainingTickets > $price){
    //             $remainingTickets = $remainingTickets - $price;

    //             // update user balance



    // }


