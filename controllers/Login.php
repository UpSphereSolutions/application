<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Food_model');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->helper('url'); 
        // print_r($this->session->userdata('user'));exit();
        if ($this->session->userdata('user')) {
            $this->home();
        }
    }
    function home() {
        redirect(base_url().'Satisfood/home');
    }
    public function index() 
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
            
        } else {
            $data['status'] = 1;
            $data['message'] = $res;
        } 
        $this->load->view('satisfood/Login', $data);
    }
    public function register()
	{
       $this->load->view('satisfood/Register'); 
    }
}