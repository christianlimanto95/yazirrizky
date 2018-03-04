<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include general controller supaya bisa extends General_controller
require_once("application/core/General_controller.php");

class Home extends General_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Home_model");
	}
	
	public function index()
	{
		$data = array(
			"title" => "Home"
		);
		
		parent::view("home", $data);
	}

	public function insert() {
		parent::load_module("DatePickerX.min");
		$data = array(
			"title" => "Insert"
		);
		parent::view("insert", $data);
	}

	function do_insert() {
		$gender = $this->input->post("gender", true);
		$email = $this->input->post("email", true);
		$room_id = $this->input->post("room_id", true);
		$date_start = $this->input->post("date_start", true);
		$date_end = $this->input->post("date_end", true);
		$number = $this->input->post("number", true);

		$data = array(
			"gender" => $gender,
			"email" => $email,
			"room_id" => $room_id,
			"date_start" => $date_start,
			"date_end" => $date_end,
			"number" => $number
		);

		$this->Home_model->insert($data);

		header("Location: " . base_url("insert"));
	}
}
