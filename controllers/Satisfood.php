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
        $this->user = $this->session->userdata('user');
        
        if ($this->session->userdata('user')) {
            // $this->home();
        } else {
            $this->login();
        }
    }

	public function index()
	{ 
        $data['user'] = $this->user;
        $this->load->view('Satisfood/dashboard', $data); 
    }

    function manageAccount() {
        $data['userlist'] = $this->Food_model->getList();
        $data['user'] = $this->user;
        $this->load->view('Satisfood/manageAccount', $data); 
    }
    
    public function home() {
        $data['user'] = $this->user;
        $this->load->view('Satisfood/dashboard', $data); 
    }

    public function logout() {
        $this->session->unset_userdata('user');
        redirect(base_url().'Login');
    }

    public function login() 
    { 
        redirect(base_url().'Login');
    }

    public function verifyIp() {
       $ip = $this->uri->segment(3); 
       $res = $this->Food_model->verifyIp(base64_decode($ip.''));
       $data['data'] = $res[0]; 
      $this->load->view('Satisfood/verifyIp', $data);
    }
}