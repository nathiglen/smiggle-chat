

1. Log on to your mysql and create database called 'smiggle'. 

2. Inside smiggle database, createor dump the following table structures:

--
-- Creating `user` table
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Preload users
--

INSERT INTO `user` (`user_id`, `email`, `password`) VALUES
(null, 'nathi.ndlovu@gmail.com', 'nathi.ndlovu'),
(null, 'john.doe@gmail.com', 'john.doe'),
(null, 'jane.doe@gmail.com', 'jane.doe'),
(null, 'tina.turner@gmail.com', 'tina.turner'),
(null, 'brenda.fassie@gmail.com', 'brenda.fassie');


--
-- Creating `connection` table
--

CREATE TABLE IF NOT EXISTS `connection` (
  `connection_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_user_id` int(11) NOT NULL,
  `second_user_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`connection_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



--
-- Creating `chats` table
--

CREATE TABLE IF NOT EXISTS `chats` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `connection_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


3. Copy the smiggle project into your wamp server "www" directory.

4. Double check if the database php file is set up according to your server details. Make sure the hostname,username,password, and database have correct values. The file content looks as is below and its location is "/www/smiggle-chat/application/config/database.php".


5. Launch the application by copying and pasting this "http://127.0.0.1/smiggle-chat/" into your web browser.










