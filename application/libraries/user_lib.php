<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class user_lib {

    public $user_id;
    public $email;
    public $password;

    public function get_specific_user($email, $password) {
        $CI = &get_instance();
        $CI->load->model("user_db");
        $user_data = $CI->user_db->get_specific_user($email, $password);
        if ($user_data) {
            $this->user_id = $user_data['user_id'];
            $this->email = $user_data['email'];
            $this->password = $user_data['password'];
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
