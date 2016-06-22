<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("user_lib");
        $this->load->library("session");
        $this->load->helper(array("url","form"));
    }

    public function index() {
        $this->load->view("login/index");
    }

    public function verify() {
        $fdata = $this->input->post();
        if ($this->user_lib->get_specific_user($fdata['email'], $fdata['password']) == true) {
            $this->session->set_userdata(array('user_id' => $this->user_lib->user_id, 'email' => $this->user_lib->email, 'password' => $this->user_lib->password));
            redirect("userlist/index");
        }
    }

}
