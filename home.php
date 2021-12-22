<?php
	session_start();

	if (!isset($_SESSION["signedin"]) && $_SESSION["signedin"]==false) {
		header("location:index.php");
		exit();
	}
	require_once('conn.php');
	include 'functions.php';

	$retrieve = "SELECT * FROM posts ORDER BY id DESC";
	$est = mysqli_query($connect, $retrieve);

	$username = $_SESSION["signedin"];
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$query = mysqli_query($connect, $sql);
	$col = mysqli_fetch_assoc($query);
	$msg = "";

	if(isset($_POST["post"])){
		$msg = $_POST["message"];
		
		if (empty($msg)) {
			header("location:home.php?post=messageempty");
			exit();
		} else {
			$userId = $col['user_id'];	
			$insert = "INSERT INTO posts (user_id, post) VALUES('$userId','$msg')";
			$result = mysqli_query($connect, $insert);

			if (!$result) {
				header("location:home.php?post=postfailure");
				exit();
			} else{
				header("location:home.php?post=posted");
				exit();
			}
		}
	}
	
	mysqli_close($connect);
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
<style type="text/css">
.post-field{			/*message field*/
	position: fixed;
	margin-top: 44px;
	height: 6vh;
	width: 100vw;
	padding-left: 20px;
	border: 1px solid #ccc;
	font-weight: bolder;
	z-index: 2;
}
.post-btn{				/*post button*/
	position: fixed;
	margin-top: 61px;
	height: 6vh;
	width: 100vw;
	padding-left: 20px;
	border: 2px solid #ccc;
	font-weight: bolder;
	background-color: lightgrey;
	z-index: 2;
}
.nav-left{				/*aside navigation*/
	position: fixed;
	width: 20vw;
	margin-top: 110px; 
	margin-left: 0.2vw;
	border: 1px solid #ccc;
	border-radius: 5px;
	padding: 10px;
	font-weight: normal;
	z-index: 0;
}
.printed{
	position: absolute;
	width: 79.3vw;
	height: 100vh;
	margin-top: 110px; 
	margin-left: 278px;
	border-radius: 5px;
	padding: 10px;
	padding-left: 50px;
	font-weight: bolder;
	z-index: 0;
}
.list ul{
	list-style: none;
}
.list li{
	margin-top: 8px;
	font-weight: bold;
}
.click{
	padding: 5px;
	text-decoration: none;
}
.psts{
	text-decoration: none;
	color: darkgreen;
}
.psts:hover{
	color: lightgreen;
	text-transform: uppercase; 
}

</style>

</head>
<body id="body" class="container-center">
	<header class="top">
		<a class="link" href="home.php"><i class="fas fa-home"></i> Home</a>
		<a class="link" href="user.php"><i class="fa fa-user-circle"></i> About</a>
		<div class="right">
			<a class="link" href="register.php"><i class="fa fa-edit"></i> Logout</a>
		</div>
	</header>

	
	<div class="pub_msg">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
			<div>
				<input type="text" name="message" class="post-field" placeholder="Leave a Public Message Here">
			</div><br>
			<div class="#">
				<button type="submit" name="post" class="post-btn">Post</button>
			</div>
			<div class="printed">
				<table class="table">
					<tbody>
						<tr>
							<?php while($post = mysqli_fetch_assoc($est)): ?>
								<td><a href="chat.php?id=<?php echo $post["id"];?>" class="psts"><?php echo $post['post'];?></td></a>
						</tr>
							<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</form>
	</div>
	<div class="nav-left">
		<img src="pic.jpg" width="70" height="70" class="pic">
		<div class="cred">
			<b>Comp:</b> 
			<span id="cred"><?php echo $col['comp']; ?></span>
		</div>
		<div class="cred">
			<b>School:</b> 
			<span id="cred"><?php echo $col['school']; ?></span>
		</div>
		<div class="cred">
			<b>Program:</b> 
			<span id="cred"><?php echo $col['program']; ?></span>
		</div>
		<div class="cred">
			<b>Username:</b> 
			<span id="cred"><?php echo $col['username']; ?></span>
		</div><hr>
		<form class="list" action="schools.php" method="post" enctype="multipart/form-data">
			<p><b>SCHOOLS OF ADMISSION:</b></p>
			<ul>
				<li><a href="mining.php" class="click btn-success">Sch of Mining</a></li>
				<li><a href="business.php" name="busi" class="click btn-success">Sch of Business</a></li>
				<li><a href="education.php" name="edu" class="click btn-success">Sch of Education</a></li>
				<li><a href="engineering.php" name="eng" class="click btn-success">Sch of Engineering</a></li>
				<li><a href="natural.php" name="nat" class="click btn-success">Sch of Natural Sciences</a></li>
				<li><a href="veterinary.php" name="vet" class="click btn-success">Veterinary Medicine</a></li>
				<li><a href="agriculture.php" name="agric" class="click btn-success">Agricultural Sciences</a></li>
				<li><a href="humanities.php" name="human" class="click btn-success">Humanities & Social Sciences</a></li>
			</ul>
		</form>
	</div>
</body>
</html>