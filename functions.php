<?php
	include 'conn.php';

	//Grab all the informatio about posts
	$sql_post = "SELECT * FROM posts ORDER BY post_id DESC";
	$result_post = mysqli_query($connect, $sql_post);

	//Grab the id of posts
	
	
	//Grab all the information about comments
	$sql_comment = "SELECT * FROM comments ORDER BY comment_id DESC";
	$result_comment = mysqli_query($connect, $sql_comment);
?>