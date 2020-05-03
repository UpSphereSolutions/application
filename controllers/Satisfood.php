<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Satisfood extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Food_model');
        $this->load->library('email');
        $this->load->library('session');
        
        $this->load->helper('url'); 
        // print_r($this->session->userdata('user'));exit();
        if ($this->session->userdata('user')) {
            $this->home();
        } else {
            // $this->login();
        }
    }

	// public function index()
	// { 
    //     // print_r(base64_encode('10.10.1.98'));exit(); 
    //    $this->load->view('Satisfood/Login'); 
    // }
    public function home() {
        $this->load->view('Satisfood/dashboard'); 
    }

    public function logout() {
        $this->session->unset_userdata('user');
        redirect(base_url().'Satisfood/login');
    }

    public function login() 
    {   
       
        $username = $this->input->post('inputUsername');
        $password = $this->input->post('inputPassword');
        $ip = $this->input->ip_address();
        $data = array();
        if ($ip) {

            // print_r($password);exit();
            $res = $this->Food_model->login($username,$password,$ip);
         
            $res = $res[0];
            // print_r($res);exit();
            if (count($res) > 10) {
              $this->session->set_userdata('user', $res);
            //   print_r($this->session->userdata('user'));
            //   print_r($res);
            // exit();
              redirect(base_url().'Satisfood/home');
            }
            if ($res['S'] == 3) {
                $data['status'] = $res['S'];
                $data['message'] = $res['M'];
                $res = $this->Food_model->sendEmail( $username, $password); 
            }
            elseif ($res['S'] == 10) {
                $data['status'] = $res['S'];
                $data['message'] = $res['M'];
                $res = $this->Food_model->sendEmail( $username, $password); 
            }
            elseif ($res['S'] == 0) {
                $data['status'] = 'No data';
                $data['message'] = $res['M'];
            }
            else {
            //   redirect(base_url().'Satisfood/home');
            }
            // $this->load->view('Satisfood/login', $data);
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