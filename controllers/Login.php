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

    public function generateSpecialEvent() {
            $data = $this->Food_model->getSpecialEvent(); 
            echo json_encode($data);
    }

    public function generateTopMerchant() {
        $data = $this->Food_model->getTopMerchant(); 
        echo json_encode($data);
    }

    public function generateMenu() {
        $requestBody = json_decode($this->input->raw_input_stream, true);
        $id = $requestBody['id'];
        $data = $this->Food_model->getMenu(); 
        echo json_encode($data);
    }

    public function registerUser() { 
        $requestBody = json_decode($this->input->raw_input_stream, true);

        $firstname = $requestBody['firstname'];
        $middlename = $requestBody['middlename'];
        $lastname = $requestBody['lastname'];
        $gender = $requestBody['gender'];
        $birthdate = $requestBody['birthdate'];
        $contactNo = $requestBody['contactNo'];
        $email = $requestBody['email'];
        $username = $requestBody['username'];
        $password = $requestBody['password'];

        $data = $this->Food_model->registerAppUser(
            $firstname,
            $middlename,
            $lastname,
            $gender,
            $birthdate,
            $contactNo,
            $email,
            $username,
            $password
        );

        if ($data[0]) {
            $sendEmail = $this->Food_model->sendVerificationCode($email);
            if ($sendEmail) { 
                echo json_encode($data[0]);
            } else {
                echo json_encode([]);
            }
        }
    }

    public function VerifyAppUser()
    {
        $requestBody = json_decode($this->input->raw_input_stream, true);
        $email = $requestBody['email'];
        $code = $requestBody['code'];
        $data = $this->Food_model->verifyAppUser( 
            $email,
            $code
        ); 
        
        return $data;
    }

    public function LogInAppUser() {

        $requestBody = json_decode($this->input->raw_input_stream, true);
 
        $username = $requestBody['username'];
        $password = $requestBody['password'];

        $data = $this->Food_model->LoginAppUser( 
            $username,
            $password
        );  
        if (count($data) > 0){
            echo (json_encode(array('S'=>1,'data' => $data[0])));
        }
        else {
            echo (json_encode(array('S'=>0,'data' => $data)));
        }
    }
}