<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food extends CI_Controller {
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
}