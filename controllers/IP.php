<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class IP extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Food_model');
        $this->load->library('email');

        $this->load->helper('url'); 
    }
    public function verifyIp() {
       $code = $this->input->post('code');
       $data="";
        if (isset($code)) {
            $data = (array)json_decode(base64_decode($code)); 
            // print_r($data);exit();
            if (count($data) > 2) {
                $password = $data['password'];
                $ip = $data['ip'];
                $username = $data['username'];
              
                $data['data']['M'] = 'Direct access not allowed'; 
                if ($data != '') {
                     $res = $this->Food_model->verifyIp($password,$username,$ip);
                     if ($res[0]) {
                        $data['data'] = "Ip Verified";
                        $this->load->view('satisfood/verifyIp', $data);
                     } else {
                        $data['data'] = "Please try again";
                        $this->load->view('satisfood/verifyIp', $data);
                     }
                }
            } else {
                $data['data'] = "Invalid credentials";
                $this->load->view('satisfood/verifyIp', $data);
            }
       } else {
        $this->load->view('satisfood/verifyIp');
       }
    }
}
