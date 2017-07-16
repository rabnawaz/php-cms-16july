<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "malala";
    $connection = mysqli_connect('localhost', 'root', '', 'malala');

    // Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

?>