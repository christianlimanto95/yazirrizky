<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include the base class
require_once("application/core/Front_controller.php");

class Home extends Front_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("front/Home_model");
	}
	
	public function index()
	{
		$data = array(
			"title" => "Home"
		);
		
		$this->template("home", $data);
	}
}
