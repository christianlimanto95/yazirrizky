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
			"title" => "Home",
			"header" => array(
				"home" => "selected",
				"insert" => "",
				"update" => "",
				"delete" => ""
			)
		);
		
		parent::view("home", $data);
	}

	public function insert() {
		parent::load_module("DatePickerX.min");
		$data = array(
			"title" => "Insert",
			"header" => array(
				"home" => "",
				"insert" => "selected",
				"update" => "",
				"delete" => ""
			)
		);
		parent::view("insert", $data);
	}

	function do_insert() {
		$name = $this->input->post("name", true);
		$gender = $this->input->post("gender", true);
		$email = $this->input->post("email", true);
		$room_id = $this->input->post("room_id", true);
		$date_start = $this->input->post("date_start", true);
		$date_end = $this->input->post("date_end", true);
		$number = $this->input->post("number", true);

		$data = array(
			"name" => $name,
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

	public function update() {
		parent::load_module("DatePickerX.min");
		$data = array(
			"title" => "Update",
			"header" => array(
				"home" => "",
				"insert" => "",
				"update" => "selected",
				"delete" => ""
			),
			"data" => $this->Home_model->get_update_index()
		);
		parent::view("update", $data);
	}

	public function get_data_by_id() {
		$id = $this->input->post("id", true);
		$data = $this->Home_model->get_data_by_id($id);
		if (sizeof($data) > 0) {
			$date_item = explode("-", $data[0]->data_date_start);
			$data[0]->data_date_start = $date_item[2] . "-" . $date_item[1] . "-" . $date_item[0];
			$date_item = explode("-", $data[0]->data_date_end);
			$data[0]->data_date_end = $date_item[2] . "-" . $date_item[1] . "-" . $date_item[0];
		}
		echo json_encode(array(
			"status" => "success",
			"data" => $data
		));
	}

	public function delete() {
		parent::load_module("DatePickerX.min");
		$data = array(
			"title" => "Delete",
			"header" => array(
				"home" => "",
				"insert" => "",
				"update" => "",
				"delete" => "selected"
			)
		);
		parent::view("delete", $data);
	}
}
