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
class Satisfood extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Food_model');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->helper('form');
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
        $this->load->view('satisfood/dashboard', $data); 
    }

    function manageAccount() {
        $data['userlist'] = $this->Food_model->getList();
        $data['user'] = $this->user;
        $this->load->view('satisfood/manageAccount', $data); 
    }

    function manageMerchantAccount() {
        $data['userlist'] = $this->Food_model->getMerchant();
        $data['user'] = $this->user;
        $this->load->view('satisfood/merchantAccount', $data); 
    }

    function manageDriverAccount() {
        $data['userlist'] = $this->Food_model->getList();
        $data['user'] = $this->user;
        $this->load->view('satisfood/driverAccount', $data); 
    }

    function profile() {
        $data = '';
        $this->load->view('satisfood/profile', $data); 
    }

    function do_upload() {
        
        
        $config = array(
            'upload_path' => "./images/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf"
            );
            $this->load->library('upload', $config);
            $this->upload->initialize($config); //Make this line must be here.
            if($this->upload->do_upload('userfile'))
            {
            $data = array('upload_data' => $this->upload->data());
                // print_r($data);
                // print_r($this->upload->do_upload('userfile'));
                redirect(base_url().'satisfood');
            }
            else
            {
                $this->load->view('satisfood/dashboard');
                $this->load->view('satisfood/profile');
            }
    }
    
    function uploadImage() {
        $img = $this->input->post('img');
        $c = curl_init();
        $filename = rand(1000039600,1000000).'.png';
        $fp = fopen($img , "r");
        // print_r($img);
        curl_setopt($c, CURLOPT_URL, "ftp.ghd.qqt.mybluehost.me/".$filename);
        curl_setopt($c, CURLOPT_USERPWD, "upsphere@ghd.qqt.mybluehost.me:TheSphere@2020");
        curl_setopt($c, CURLOPT_UPLOAD, 1);
        curl_setopt($c, CURLOPT_INFILE, $fp);
        // curl_setopt($c, CURLOPT_INFILESIZE, filesize($img));
    
        $data = curl_exec($c);
        // print_r($data);
          if ($data) {
            $result = $this->Food_model->updateProfile("image = 'ghd.qqt.mybluehost.me/upsphere/".$filename."' where id = ".$this->user['id']);
            $this->user = $this->session->userdata('user');
            $this->user['image'] = "ghd.qqt.mybluehost.me/upsphere/".$filename;
            $this->session->set_userdata('user', $this->user); 
            echo $result;
          } else {
              echo $data;
          }
        curl_close($c);
    }

    function update() {
       $data = $this->input->post('data');
       $data = json_decode(json_encode($data));
    //    print_r($data);
       if ($data->target == 'email') {
        $result = $this->Food_model->updateProfile("email = '".$data->email."' where id = ".$this->user['id']);
        $this->user = $this->session->userdata('user');
        $this->user['email'] = $data->email;
        $this->session->set_userdata('user', $this->user);  
        print_r($result);
       } elseif ($data->target == 'profilename') {
        $result = $this->Food_model->updateProfile("fname = '".$data->fname."', mname = '".$data->mname."', lname = '".$data->lname."' where id = ".$this->user['id']);
        $this->user = $this->session->userdata('user');
        $this->user['fname'] = $data->fname;
        $this->user['mname'] = $data->mname;
        $this->user['lname'] = $data->lname;
        $this->session->set_userdata('user', $this->user);  
        print_r($result);
       }elseif ($data->target == 'contactno') {
        $result = $this->Food_model->updateProfile("contactno = '".$data->contactno."' where id = ".$this->user['id']);
        $this->user = $this->session->userdata('user');
        $this->user['contactno'] = $data->contactno;
        $this->session->set_userdata('user', $this->user);  
        print_r($result);
       }elseif ($data->target == 'gender') {
        $result = $this->Food_model->updateProfile("gender = '".$data->gender."' where id = ".$this->user['id']);
        $this->user = $this->session->userdata('user');
        $this->user['gender'] = $data->gender;
        $this->session->set_userdata('user', $this->user);  
        print_r($result);
       }
       
    }

    function manageHungryCustomerAccount() {
        $data['userlist'] = $this->Food_model->getList();
        $data['user'] = $this->user;
        $this->load->view('satisfood/hungryCustomerAccount', $data); 
    }

    function createMerchant() {
        echo $this->input->post('name');;
    }

    public function home() {
        $data['user'] = $this->user;
        $this->load->view('satisfood/dashboard', $data); 
    }

    public function logout() {
        $res = $this->Food_model->updateProfile("status = 'OFFLINE' where id = ".$this->user['id']);
        // print_r($res);exit();
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
      $this->load->view('satisfood/verifyIp', $data);
    }
}