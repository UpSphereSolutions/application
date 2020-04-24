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
        print_r($this->uri->segment(3));exit();
        $this->load->library('encryption');
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://mail.upspheresolutions.com',
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
        
        $this->email->to('andoyandoy5@gmail.com');
        $this->email->from('upsphere@upspheresolutions.com');
        $this->email->subject('NO REPLY!!');
        $this->email->message($htmlContent);
        //Send email
        $res =   $this->email->send();
        echo json_encode($res);
    }

    public function uploadImage() {

        $c = curl_init();
 
        $fp = fopen('C:/Users/retchel/Downloads/file.png' , "r");
    
        curl_setopt($c, CURLOPT_URL, "ftp.ghd.qqt.mybluehost.me/filess.png");
        curl_setopt($c, CURLOPT_USERPWD, "upsphere@ghd.qqt.mybluehost.me:TheSphere@2020");
        curl_setopt($c, CURLOPT_UPLOAD, 1);
        curl_setopt($c, CURLOPT_INFILE, $fp);
        curl_setopt($c, CURLOPT_INFILESIZE, filesize('C:/Users/retchel/Downloads/file.png'));
    
        $data = curl_exec($c);
          echo $data;
        curl_close($c);
    }
}