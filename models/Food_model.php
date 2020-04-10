<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food_model extends CI_Model {


public function getUser($username, $password)
{
        $result = $this->db->query("CALL sp_login('$username','$password')");
        return $result->result_array();
}


public function registerUser($lastname, $firstname, $middlename, $contactNo, $email, $username, $password, $ip)
{
        $result = $this->db->query("CALL sp_users('$lastname','$firstname','$middlename','$contactNo','$email','$username','$password', '$ip')");
        return $result->result_array();
}

// <!-- public function insert_entry()
// {
//         $this->title    = $_POST['title']; // please read the below note
//         $this->content  = $_POST['content'];
//         $this->date     = time();

//         $this->db->insert('entries', $this);
// }

// public function update_entry()
// {
//         $this->title    = $_POST['title'];
//         $this->content  = $_POST['content'];
//         $this->date     = time();

//         $this->db->update('entries', $this, array('id' => $_POST['id']));
// } -->

}