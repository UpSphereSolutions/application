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

public function getList() {
        $result = $this->db->query("SELECT * FROM user_details INNER JOIN `user_address` ON `user_address`.`id` = `user_details`.`address`");
        $result =  $result->result_array(); 
        return $result;
}

public function getMerchant() {
        $result = $this->db->query("SELECT * FROM merchant_account");
        $result =  $result->result_array(); 
        return $result;
}

public function sendEmail($username, $password) {
        $result = $this->db->query("CALL sp_check_email('$username', '$password')");
        $result =  $result->result_array();
        mysqli_next_result( $this->db->conn_id );
        // print_r($result[0]['email']);exit();
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

                $params = array('username' => $username, 'password' => $password, 'ip' => $this->input->ip_address());
                $this->email->initialize($config);
                $this->email->set_mailtype("html");
                $this->email->set_newline("\r\n");
                //Email content
                $htmlContent = '<h1 style="color: #5e9ca0;">UPSPHERE SOLUTIONS</h1>';
                $htmlContent = '<a href="http://ghd.qqt.mybluehost.me//IP/verifyIp/'.base64_encode(json_encode($params)).'"><h1 style="color: #5e9ca0;">UPSPHERE SOLUTIONS</h1></a>';
                
                $this->email->to($result[0]['email']);
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

    public function verifyIp($password, $username, $ip) {
        $result = $this->db->query("CALL sp_manageIp('$password','$username','$ip')");
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