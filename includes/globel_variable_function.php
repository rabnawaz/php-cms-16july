<?php
    $user_ip = $_SERVER['REMOTE_ADDR'];

    echo "Your IP address is:" .$user_ip;

    function echo_ip(){
    	$string = "Your IP address is:" .$user_ip;
    }

?>