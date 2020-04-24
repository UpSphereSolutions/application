<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food_model extends CI_Model {


public function getUser($username, $password)
{
        $result = $this->db->query("CALL sp_login('$username','$password')");
        $result =  $result->result_array();
        mysqli_next_result( $this->db->conn_id );
        return $result;
}


public function registerUser($lastname, $firstname, $middlename, $contactNo, $email, $username, $password, $ip)
{
        $result = $this->db->query("CALL sp_users('$lastname','$firstname','$middlename','$contactNo','$email','$username','$password', '$ip')");
        $result =  $result->result_array();
        mysqli_next_result( $this->db->conn_id );
        return $result;
}

public function login($username, $password, $ip) {
        
        $result = $this->db->query("CALL sp_login(
                '$username',
                '$password', 
                '$ip'
            );");
        $result =  $result->result_array();
        mysqli_next_result( $this->db->conn_id );
        return $result;
}

public function sendEmail($email) {
        $result = $this->db->query("CALL sp_check_email('andoyandoy5@gmail.co')");
        $result =  $result->result_array();
        mysqli_next_result( $this->db->conn_id );
        if (count($result) > 0) {
                $this->load->library('encryption');
                $config = array(
                    'protocol'  => 'smtp',
                    'smtp_host' => 'ssl://mail.upspheresolutions.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'no-reply@upspheresolutions.com',
                    'smtp_pass' => 'TheSphere@2020',
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8'
                );
                $this->email->initialize($config);
                $this->email->set_mailtype("html");
                $this->email->set_newline("\r\n");
                //Email content
                $htmlContent = '<h1 style="color: #5e9ca0;">UPSPHERE SOLUTIONS</h1>';
                $htmlContent = '<a href="http://localhost:8000/VerifyIp/verifyIp/'.base64_encode($this->input->ip_address()).'"><h1 style="color: #5e9ca0;">UPSPHERE SOLUTIONS</h1></a>';
                
                $this->email->to('andoyandoy5@gmail.com');
                $this->email->from('no-reply@upspheresolutions.com');
                $this->email->subject('NO REPLY!!');
                $this->email->message($htmlContent);
                //Send email
                $res =   $this->email->send();
                return $res;
        } else {
                print_r('Email not found');exit();
        }

    }

    public function verifyIp($ip) {
        $result = $this->db->query("CALL sp_manageIp('$ip')");
        $result =  $result->result_array();
        mysqli_next_result( $this->db->conn_id );
        return $result;
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