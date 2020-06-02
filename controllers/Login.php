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
        redirect(base_url().'satisfood/home');
    }
    public function index() 
    {   
       
        $username = $this->input->post('inputUsername');
        $password = $this->input->post('inputPassword');
        $ip = $this->input->ip_address();
        $data = array();
        if (isset($username) && isset($password)) {

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
              redirect(base_url().'satisfood/home');
            }
            if ($res['S'] == 3) {
                $emailSent = $this->Food_model->sendEmail('zusez3', 'freemake12'); 
                // echo $res;
                if ($emailSent) {
                    $data['status'] = $res['S'];
                    $data['message'] = $res['M'];
                    redirect(base_url().'IP/verifyIp');
                } else {
                    $data['status'] = 'No data';
                    $data['message'] = 'Internal error';
                    redirect(base_url().'IP/verifyIp');
                }
            }
            elseif ($res['S'] == 10) {
                echo 's 10';
                $emailSent = $this->Food_model->sendEmail('zusez3', 'freemake12'); 
                if ($emailSent) {
                    $data['status'] = $res['S'];
                    $data['message'] = $res['M'];
                    redirect(base_url().'IP/verifyIp');
                } else {
                    $data['status'] = 'No data';
                    $data['message'] = 'Internal error';
                    redirect(base_url().'IP/verifyIp');
                }
            }
            elseif ($res['S'] == 0) {
                $data['status'] = 'No data';
                $data['message'] = $res['M'];
            }
            else {
                $data['status'] = 'Please try again';
                $data['message'] = $res['M'];
            //   redirect(base_url().'Satisfood/home');
            }
            
        } else {
            $data['status'] = 1;
            $data['message'] = $res;
        } 
        
    }
        $this->load->view('satisfood/Login', $data);
    }
    public function register()
	{
       $this->load->view('satisfood/Register'); 
    }
    
    public function sendEmail()
    {
        $res = $this->Food_model->sendEmail('zusez3', 'freemake12'); 
        echo $res;
    }

    public function generateProduct() {
        $data = array(
            array('eventName'=>'Satisfood Driver Account Will Be Available Soon', 'id'=> 1, 'expired'=> 'jun-30-2020', 'image'=> 'http://ghd.qqt.mybluehost.me/satisfood/driverAccount.jpg'),
            array('eventName'=> 'Satisfood Merchant Account Will Be Available Soon', 'id'=> 2, 'expired'=> 'jun-30-2020', 'image'=> 'http://ghd.qqt.mybluehost.me/satisfood/merchantAccount.jpg'),
            array('eventName'=> 'Satisfood User Account Will Be Available Soon', 'id'=> 3, 'expired'=> 'jun-30-2020', 'image'=>'http://ghd.qqt.mybluehost.me/satisfood/userAccount.jpg'),
           
            array('eventName'=>'Satisfood Driver Account Will Be Available Soon', 'id'=> 1, 'expired'=> 'jun-30-2020', 'image'=> 'http://ghd.qqt.mybluehost.me/satisfood/driverAccount.jpg'),
            array('eventName'=> 'Satisfood Merchant Account Will Be Available Soon', 'id'=> 2, 'expired'=> 'jun-30-2020', 'image'=> 'http://ghd.qqt.mybluehost.me/satisfood/merchantAccount.jpg'),
            array('eventName'=> 'Satisfood User Account Will Be Available Soon', 'id'=> 3, 'expired'=> 'jun-30-2020', 'image'=>'http://ghd.qqt.mybluehost.me/satisfood/userAccount.jpg'),
            array('eventName'=> 'Buy essentials via SatisfoodExpress Pabili', 'id'=> 4, 'expired'=> 'jun-30-2020', 'image'=>'https://www.dinneratthezoo.com/wp-content/uploads/2019/06/stir-fry-noodles-3-2-500x500.jpg'),
            array('eventName'=> 'Buy essentials via SatisfoodExpress Pabili', 'id'=> 5, 'expired'=> 'jun-30-2020', 'image'=> 'https://www.dinneratthezoo.com/wp-content/uploads/2019/06/stir-fry-noodles-3-2-500x500.jpg'),
            array('eventName'=> 'Buy essentials via SatisfoodExpress Pabili', 'id'=> 6, 'expired'=> 'jun-30-2020', 'image'=>'https://www.dinneratthezoo.com/wp-content/uploads/2019/06/stir-fry-noodles-3-2-500x500.jpg'),
            array('eventName'=> 'Buy essentials via SatisfoodExpress Pabili', 'id'=> 7, 'expired'=> 'jun-30-2020', 'image'=> 'https://www.dinneratthezoo.com/wp-content/uploads/2019/06/stir-fry-noodles-3-2-500x500.jpg'));
        echo json_decode($data);
    }
}