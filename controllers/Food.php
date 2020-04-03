<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food extends CI_Controller {
	public function index()
	{
        echo json_encode(array(array("name"=>"rb", "img"=>"hjshjdhka.png", "prince"=> "100.00"),
                   array("name"=>"rb", "img"=>"hjshjdhka.png", "prince"=> "100.00")));
	}
}
