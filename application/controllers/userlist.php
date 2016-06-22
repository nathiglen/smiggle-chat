<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class userlist extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("user_db");
        $this->load->helper("connection");
            $this->load->helper(array("url","form"));
        $this->load->library(array("session", "user_lib"));
        $this->sessiondata = $this->session->all_userdata();
    }

    public function index() {
        $data['users'] = $this->user_db->get_all_users();
        $data['current_user_id'] = $this->sessiondata['user_id'];
        $data['current_user_email'] = $this->sessiondata['email'];
        $data['current_user_password'] = $this->sessiondata['password'];
        $this->load->view("userlist/index", $data);
    }
}
