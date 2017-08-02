<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
NOTE
Just put general function which frequently used in this class
**/

//include the base class
require_once("application/core/General_controller.php");

class Front_controller extends General_controller
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common/Front_model');
    }
	
	public function template($file, $data){
		$data = parent::template($file, $data);
		$data["page_name"] = "front/" . $file;
		
        $this->load->view('common/header', $data);
        $this->load->view("front/" . $file, $data);
        $this->load->view('common/footer');
    }
}