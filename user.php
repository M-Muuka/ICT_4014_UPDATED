<?php
	require 'conn.php';
	$user = $_SESSION["signedin"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>University of Zambia Student Online Hub</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="./awesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body id="body" class="container-center">
	<header class="top">
		<a class="link" href="home.php"><i class="fas fa-home"></i> Home</a>
		<a class="link" href="user.php"><i class="fa fa-user-circle"></i> About</a>
		<a class="link" href="chat.php"><i class="far fa-comment-dots"> Chat</i></a>
		<a class="link" href="notification.php"><i class="fas fa-bell"> Notifications</i></a>
		<div class="right">
			<a class="link" href="index.php"><i class="fa fa-edit"></i> Logout</a>
		</div>
	</header>

	
	<div class="customize">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
			<div class="pic">
				Your Profile Pic Goes Here<br>
				<input type="file" name="" placeholder="Upload">
			</div>

			<div class="la">
				<label>Username</label>
				<span class="det">Sinkala</span>
			</div>

			<div class="prof">
				<label class="la">Full Name</label>
				<span class="det">SinkalaJulius</span>
			</div>

			<div class="prof">
				<label class="la">School of Admission</label>
				<span class="det">Education</span>
			</div>

			<div class="prof">
				<label class="la">Programme</label>
				<span class="det">ICT</span>
			</div>

			<div class="prof">
				<label class="la">Year of Study</label>
				<span class="det">4TH</span>
			</div>
		</form>
	</div>
</body>
</html>