<?php

class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_all_data() {
        $query = $this->db->query("
            SELECT d.data_id, d.data_name, (CASE when d.data_gender = 'm' THEN 'Male' ELSE 'Female' END) AS data_gender, d.data_email, r.room_name, d.data_date_start, d.data_date_end, d.data_number
            FROM data d, room r
            WHERE r.room_id = d.room_id
        ");
        return $query->result();
    }

    function get_selected_room_count() {
        $query = $this->db->query("
            SELECT r.room_name, COUNT(d.room_id) AS count
            FROM data d, room r
            WHERE d.room_id = r.room_id
            GROUP BY r.room_id
        ");
        return $query->result();
    }

    function get_gender_count() {
        $query = $this->db->query("
            SELECT (CASE when d.data_gender = 'm' THEN 'Male' ELSE 'Female' END) AS data_gender, COUNT(d.data_gender) AS count
            FROM data d
            GROUP BY d.data_gender
        ");
        return $query->result();
    }

    function insert($data) {
        $date_item = explode("-", $data["date_start"]);
        $data["date_start"] = $date_item[2] . "-" . $date_item[1] . "-" . $date_item[0];
        $date_item = explode("-", $data["date_end"]);
        $data["date_end"] = $date_item[2] . "-" . $date_item[1] . "-" . $date_item[0];
        $insertData = array(
            "data_name" => $data["name"],
            "data_gender" => $data["gender"],
            "data_email" => $data["email"],
            "room_id" => $data["room_id"],
            "data_date_start" => $data["date_start"],
            "data_date_end" => $data["date_end"],
            "data_number" => $data["number"]
        );
        $this->db->insert("data", $insertData);
    }

    function get_update_index() {
        $this->db->select("data_id, data_name");
        $this->db->where("status", 1);
        return $this->db->get("data")->result();
    }

    function get_data_by_id($id) {
        $this->db->where("data_id", $id);
        $this->db->limit(1);
        return $this->db->get("data")->result();
    }

    function update($data) {
        $date_item = explode("-", $data["date_start"]);
        $data["date_start"] = $date_item[2] . "-" . $date_item[1] . "-" . $date_item[0];
        $date_item = explode("-", $data["date_end"]);
        $data["date_end"] = $date_item[2] . "-" . $date_item[1] . "-" . $date_item[0];
        $updateData = array(
            "data_name" => $data["name"],
            "data_gender" => $data["gender"],
            "data_email" => $data["email"],
            "room_id" => $data["room_id"],
            "data_date_start" => $data["date_start"],
            "data_date_end" => $data["date_end"],
            "data_number" => $data["number"]
        );
        $this->db->where("data_id", $data["id"]);
        $this->db->update("data", $updateData);
    }

    function delete($id) {
        $this->db->where("data_id", $id);
        $updateData = array(
            "status" => 0
        );
        $this->db->update("data", $updateData);
    }
}
