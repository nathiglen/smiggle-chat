<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists("check_connection")) {

    function check_connection($a_user_id, $b_user_id) {
        $CI = &get_instance();
        $CI->load->model("connection_db");
        return $CI->connection_db->is_connected($a_user_id, $b_user_id);
    }

}