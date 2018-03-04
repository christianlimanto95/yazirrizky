<?php

class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function insert($data) {
        $date_item = explode("-", $data["date_start"]);
        $data["date_start"] = $date_item[2] . "-" . $date_item[1] . "-" . $date_item[0];
        $date_item = explode("-", $data["date_end"]);
        $data["date_end"] = $date_item[2] . "-" . $date_item[1] . "-" . $date_item[0];
        $insertData = array(
            "data_gender" => $data["gender"],
            "data_email" => $data["email"],
            "room_id" => $data["room_id"],
            "data_date_start" => $data["date_start"],
            "data_date_end" => $data["date_end"],
            "data_number" => $data["number"]
        );
        $this->db->insert("data", $insertData);
    }
}
