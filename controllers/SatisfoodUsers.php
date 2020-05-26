<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
header('Set-Cookie: cross-site-cookie=name; SameSite=None; Secure');
header("Access-Control-Allow-Headers: Authorization");
header("Access-Control-Allow-Origin: *"); 
header('HTTP/1.0 200 OK');
header('HTTP/1.1 200 OK'); 
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0');
header('Pragma: no-cache');
class SatisfoodUsers extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Food_model');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->helper('form');
        $this->load->helper('url'); 
    }

    public function login()
	{
        $username = $this->input->post('username');
        $password = $this->input->post('password'); 
        if ($username == 'admin' && $password == 'admin') {
            http_response_code(200);
            echo json_encode(array('Message'=> 'Welcome User'));
        } else {
            http_response_code(404);
            echo json_encode(array('Message'=> 'Invalid Username/Password'));
        }
    }    
}