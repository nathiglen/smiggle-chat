<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class user_db extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_users() {
        $sql = "select * from user";
        $query = $this->db->query($sql);
        return !empty($query) ? $query->result_array() : false;
    }

    public function get_specific_user($email, $password) {
        $sql = "select * from user where (email='$email' and password='$password')";
        $query = $this->db->query($sql);
        return !empty($query) ? $query->row_array() : false;
    }

    public function get_user_by_id($user_id) {
        $sql = "select * from user where (user_id=$user_id)";
        $query = $this->db->query($sql);
        return !empty($query) ? $query->row_array() : false;
    }

}
