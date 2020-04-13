<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Food extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Food_model');
        $this->load->library('email');
    }

	public function index()
	{
        echo json_encode(array(array("name"=>"rb", "img"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1200px-Google_2015_logo.svg.png", "prince"=> "100.00"),
                   array("name"=>"rb", "img"=>"https://cdn.vox-cdn.com/thumbor/2Gx0MqNg5DKbzE9sD2uTSGKFNVM=/0x0:1000x604/1200x800/filters:focal(420x222:580x382)/cdn.vox-cdn.com/uploads/chorus_image/image/58245867/GooglePay_Lockup.max_1000x1000.0.png", "prince"=> "100.00")));
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
    
    public function registerUser() 
    {
      
        $lastname = $this->input->post('lastname'); 
        $firstname = $this->input->post('firstname');
        $middlename = $this->input->post('middlename');
        $contactNo = $this->input->post('contactno'); 
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $ip = $this->input->ip_address();
        if ($username != '' && $password != '' && $firstname != '' && $lastname != '' 
            && $middlename != '' && $contactNo != '' && $email != '' && $ip != '' ) {
            $res = $this->Food_model->registerUser($lastname, $firstname, $middlename, $contactNo, $email, $username, $password, $ip);
            $res = json_decode(json_encode($res[0]));
            if ($res->S == 1) {
                http_response_code(200);
                echo json_encode($res);
            } else {
                http_response_code(404);
                echo json_encode('USER NOT FOUND');
            }
        } else {
            http_response_code(404);
            echo json_encode(array('Message'=> 'Invalid Username/Password'));
        }
        
    }

    public function getUser() {
        $username = $this->input->post('username');
        $password = $this->input->post('password'); 
        $res = $this->Food_model->getUser($username, $password);
        if (count($res) > 0) {
            http_response_code(200);
            echo json_encode($res);
        } else {
            http_response_code(404);
            echo json_encode('USER NOT FOUND');
        }
        
    }


    public function sendEmail() {
        //SMTP & mail configuration
        $this->load->library('encryption');
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://box5742.bluehost.com',
            'smtp_port' => 465,
            'smtp_user' => 'upsphere@upspheresolutions.com',
            'smtp_pass' => 'TheSphere@2020',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        //Email content
        $htmlContent = '<h1 style="color: #5e9ca0;">UPSPHERE SOLUTIONS</h1>';
        $htmlContent .= '<p><span style="color: #0000ff;"><span style="color: #808080;">Social Media:</span></span></p>';
        $htmlContent .= '<p><span style="color: #0000ff;"><span style="color: #808080;">Social Media:</span></span></p>';
        $htmlContent .= '<ol style="list-style: none; font-size: 14px; line-height: 32px; font-weight: bold;">';
        $htmlContent .= '<li style="clear: both;"><span style="color: #0000ff;"><a href="https://www.facebook.com/UpSphere-Solutions-';
        $htmlContent .= '102288094758962/" target="_blank" rel="noopener">Upsphere Solutions</a><img style="float: left;"';
        $htmlContent .= 'src="https://encrypted-tbn0.gstatic.com/images?';
        $htmlContent .= 'q=tbn%3AANd9GcSAqrpvltqgLoZQRSNgBtsT2L5gWpMpUzU9QLB-KLSXxtSZe768&amp;usqp=CAU"';
        $htmlContent .= 'alt="interactive connection" width="43" height="43" /></span></li>';
        $htmlContent .= '<p><span style="color: #0000ff;"><span style="color: #808080;">Email: <a href="">upsphere@upspheresolutions.com</a></span></span></p>';
        $htmlContent .= '</ol>';   
        $this->email->to('andoyandoy5@gmail.com');
        $this->email->from('upsphere@upspheresolutions.com','UPSPHERE SOLUTIONS');
        $this->email->subject('NO REPLY!!');
        $this->email->message($htmlContent);
        //Send email
        $res = $this->email->send();
        echo json_encode($res);
    }

    public function uploadImage() {
        $this->load->library('ftp');
        $config['hostname'] = 'ftp://ftp.ghd.qqt.mybluehost.me';
        $config['username'] = 'upsphere@ghd.qqt.mybluehost.me';
        $config['password'] = 'TheSphere@2020';
        $config['port'] = '21';
        $config['debug']        = TRUE;
        $this->ftp->connect($config);
        $fname = 'C:/Users/retchel/Downloads/file.png';
        if (file_exists($fname)) { 
            $res = $this->ftp->upload($fname, '/public_html/upsphere/file.png', 'ascii', 0775);
        } else { echo 'File not found!'; }
      
        $this->ftp->close(); 
    }
}