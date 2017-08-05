<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
NOTE
Just put general function which frequently used in this class
**/

class General_controller extends CI_Controller
{
	protected $additional_files = "";
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common/General_model');
    }

	public function loadModule($module_name) {
		$this->loadAdditionalCss($module_name);
		$this->loadAdditionalJs($module_name);
	}
	
	public function loadAdditionalCss($file_name) {
		$this->additional_files .= "<link href='" . base_url("assets/css/template/" . $file_name . ".css") . "' rel='stylesheet'>";
	}
	
	public function loadAdditionalJs($file_name) {
		$this->additional_files .= "<script src='" . base_url("assets/js/template/" . $file_name . ".js") . "'></script>";
	}

    public function template($file, $data){
		$data["additional_files"] = $this->additional_files;
		$data["page_name"] = $file;
		
        $this->load->view('common/header', $data);
        $this->load->view($file, $data);
        $this->load->view('common/footer');
    }

	public function cekLogin() {
        if ($this->session->userdata('isLoggedIn') != 1) {
            redirect(base_url());
        }
    }
}