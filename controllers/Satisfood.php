<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Satisfood extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Food_model');
        $this->load->library('email');
        $this->load->helper('url'); 
    }

	public function index()
	{ 
         
        // print_r(base64_encode('10.10.1.98'));exit();
       $this->load->view('Satisfood/Login'); 
    }
    public function home() {
        $this->load->view('Satisfood/dashboard'); 
    }
    public function login() 
    {   
       
        $username = $this->input->post('inputUsername');
        $password = $this->input->post('inputPassword');
        $ip = $this->input->ip_address();
        $data = '';
        if ($ip) {

            // print_r($password);exit();
            $res = $this->Food_model->login($username,$password,$ip);
         
            $res = $res[0];
            
            if ($res['S'] == 3) {
                $data['status'] = $res['S'];
                $data['message'] = $res['M'];
            }
            elseif ($res['S'] == 10) {
                $data['status'] = $res['S'];
                $data['message'] = $res['M'];
                $res = $this->Food_model->sendEmail('andoyandoy5@gmail.co'); 
            }
            elseif ($res['S'] == 0) {
                $data['status'] = 'No data';
                $data['message'] = $res['M'];
            }
            else {
              redirect(base_url().'Satisfood/home');
            }
            $this->load->view('Satisfood/login', $data);
        } else {
            $data['status'] = 1;
            $data['message'] = $res;
        } 
        $this->load->view('Satisfood/login', $data);
    }
    public function register()
	{
       $this->load->view('Satisfood/Register'); 
    }
    public function verifyIp() {
       $ip = $this->uri->segment(3); 
       $res = $this->Food_model->verifyIp(base64_decode($ip.''));
       $data['data'] = $res[0]; 
      $this->load->view('Satisfood/verifyIp', $data);
    }
}