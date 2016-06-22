<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class chat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array("connection_db", "user_db", "chat_db"));
        $this->load->library(array("session"));
        $this->load->helper(array("url", "form"));
        $this->sessiondata = $this->session->all_userdata();
    }

    public function index($flag = 0, $user_id_to_chat_to, $connection_id = 0) {
        if ($flag == 0) {
            //establish connection
            $connection_id = $this->connection_db->add_connection($this->sessiondata['user_id'], $user_id_to_chat_to);
        }



        redirect("chat/chat_page/$user_id_to_chat_to/$connection_id");
    }

    public function chat_page($user_id_to_chat_to, $connection_id) {


        //user chating to
        $userchattingto = $this->user_db->get_user_by_id($user_id_to_chat_to);
        $data['userchatingto_email'] = $userchattingto['email'];
        $data['connection_id'] = $connection_id;
        $data['user_id_to_chat_to'] = $user_id_to_chat_to;
        //current user
        $data['current_user_id'] = $this->sessiondata['user_id'];

        //retrieve all the chats between two users        
        $data['chats'] = $this->chat_db->get_chats_by_connection_id($connection_id);
        $this->load->view("chat/index", $data);
    }

    public function send_chat() {
        $fdata = $this->input->post();
        $this->chat_db->add_chat($fdata['connection_id'], $this->sessiondata['user_id'], $fdata['message']);


        redirect("chat/chat_page/$fdata[user_id_to_chat_to]/$fdata[connection_id]");
    }

}
