<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class connection_db extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function is_connected($a_user_id, $b_user_id) {
        $sql = "select * from connection where ((first_user_id=$a_user_id and second_user_id=$b_user_id)  or (first_user_id=$b_user_id and second_user_id=$a_user_id)) limit 1";
        $query = $this->db->query($sql);

        if (sizeof($query->row_array()) > 0) {
            $c = $query->row_array();
            return $c['connection_id'];
        } else {
            return false;
        }
    }

    public function add_connection($a_user_id, $b_user_id) {
        $data = array("first_user_id" => $a_user_id, "second_user_id" => $b_user_id);
        $this->db->insert("connection", $data);
        return $this->db->insert_id();
    }
}
