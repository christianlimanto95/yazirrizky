<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
NOTE
Just put general function which frequently used in this class
**/

//include the base class
require_once("application/core/General_controller.php");

class Back_controller extends General_controller
{   
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        $this->load->model('common/Back_model');
    }
	
	public function template($file, $data){
		$data = parent::template($file, $data);
		$data["page_name"] = "back/" . $file;
		
        $this->load->view('common/header', $data);
        $this->load->view("back/" . $file, $data);
        $this->load->view('common/footer');
    }

    public function cekLogin()
    {
        if ($this->session->userdata('isLoggedIn') != 1) {
            redirect(base_url());
        }
    }
}