<?php
	
	$post_name = htmlentities($_POST['post_name']);
	$user_id = htmlentities($_POST['user_id']);
	$post_message = htmlentities($_POST['post_msg']);

	$mysqli = new mysqli("host", "user_name", "user_password", "database_name");
	
	if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL!";
	}

	$insert = "INSERT INTO recommendations (
								id,
								user_id,
								name,
								post_info,
								post_time)

							VALUES (
								NULL,'".
								$user_id . "','" .
								$post_name . "','" .
								$post_message . "'," .
								"CURRENT_TIMESTAMP)";

	$mysqli->query($insert);
	$mysqli->close();

?>