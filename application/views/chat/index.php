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

  <?php
     echo "<b>Chat with : <u>".   $userchatingto_email."</u></b>";
        ?>
        <ul class="list-group">




            <?php
            /*
             * To change this license header, choose License Headers in Project Properties.
             * To change this template file, choose Tools | Templates
             * and open the template in the editor.
             */

            if ($chats) {
                foreach ($chats as $c) {
                    if ($c['user_id'] == $current_user_id) {
                        echo "<li class='list-group-item'><b>Me:</b>";
                        echo "<li class='list-group-item'>" . $c['message'] . "</li>";
                    } else {
                        echo "<li class='list-group-item'><b>" . $userchatingto_email . ":</b></li>";
                        echo "<li class='list-group-item'>" . $c['message'] . "</li>";
                    }
                }
            }

            echo "</ul>";

            echo form_open("chat/send_chat");
            echo form_input(array("name" => "user_id_to_chat_to", "type" => "hidden", "value" => $user_id_to_chat_to));
            echo form_input(array("name" => "connection_id", "type" => "hidden", "value" => $connection_id));
            echo "Reply";
            echo form_input(array("name" => "message", "type" => "text"));
            echo form_submit("submit", "send");
            echo form_close();
            ?>


    </body>
</html>
