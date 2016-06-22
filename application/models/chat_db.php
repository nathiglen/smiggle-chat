<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class chat_db extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_chats_by_connection_id($connection_id) {
        $sql = "select * from chats where((connection_id=$connection_id))";
        $query = $this->db->query($sql);
        return !empty($query) ? $query->result_array() : false;
    }

    public function add_chat($connection_id, $user_id, $message) {
        $data = array("connection_id" => $connection_id, "user_id" => $user_id, "message" => $message);
        $this->db->insert("chats", $data);
    }
}