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
       $data = $this->uri->segment(3); 
       $data = (array)json_decode(base64_decode($data));
       
        
       
       $password = $data['password'];
       $ip = $data['ip'];
       $username = $data['username'];
    //    print_r($ip);exit();
       $data['data']['M'] = 'Direct access not allowed'; 
       if ($data != '') {
            $res = $this->Food_model->verifyIp($password,$username,$ip);
            $data['data'] = $res[0]; 
       }
       $this->load->view('satisfood/verifyIp', $data);
    }
}
