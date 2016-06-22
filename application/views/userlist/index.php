<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Chat</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>

      
        

        <ul class="list-group">


<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

foreach ($users as $u) {

    if ($u['email'] == $current_user_email) {
        
    } else {
        $connection_id = check_connection($current_user_id, $u['user_id']);
        echo "<li class='list-group-item'>".$u['email'];

        if ($connection_id) {
            echo " |<a href=" . base_url() . "index.php/chat/index/1/$u[user_id]/$connection_id> Continue Chatting</a></li>";
        } else {
            echo " |<a href=" . base_url() . "index.php/chat/index/0/$u[user_id]/0> Start Chatting</a></li>";
        }
    }
}
  echo "</ul>";
?>

            </body>
</html>
