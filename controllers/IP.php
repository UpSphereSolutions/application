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
       $ip = $this->uri->segment(3); 
       $data['data']['M'] = 'Direct access not allowed'; 
       if ($ip != '') {
        $res = $this->Food_model->verifyIp(base64_decode($ip.''));
        $data['data'] = $res[0]; 
       }
       $this->load->view('Satisfood/verifyIp', $data);
    }
}