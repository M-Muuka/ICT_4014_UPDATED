<?php
	session_start();
	require_once('conn.php');

	$school = "education";
	$sql = "SELECT * FROM users WHERE school = '$username'";
	$set = mysqli_query($connect, $sql);
	$fetch = mysqli_fetch_assoc($set);
	
	
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
.printed{
	position: fixed;
	width: 50vw;
	margin-top: 138px; 
	margin-left: 320px;
	border-radius: 5px;
	padding: 10px;
	font-weight: normal; 
}
.post-btn{				/*post button*/
	position: fixed;
	margin-top: 99px;
	height: 6vh;
	width: 100vw;
	padding-left: 20px;
	border: 2px solid #ccc;
	font-weight: bolder;
	background-color: lightgrey;
}
.post-field{			/*message field*/
	position: fixed;
	margin-top: 84px;
	height: 6vh;
	width: 100vw;
	padding-left: 20px;
	border: 1px solid #ccc;
	font-weight: bolder;
}
.nav-left{				/*aside navigation*/
	position: fixed;
	width: 20vw;
	margin-top: 100px; 
	margin-left: 0.2vw;
	border: 1px solid #ccc;
	border-radius: 5px;
	padding: 10px;
	font-weight: normal;
}
.ed{
	position: fixed;
	margin-top: 44.5px;
	height: 6vh;
	width: 100vw;
	padding: 5px;
	border: 1px solid #ccc;
	text-align: center;
}
.list ul{
	list-style: none;
}
.list li{
	margin-top: 5px;
}
.ul{
	font-weight: bold;
}
</style>

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

	
	<div class="pub_msg">
		<div class="ed"><h3>SCHOOL OF EDUCATION</h3></div>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
			<div>
				<input type="text" name="message" class="post-field" placeholder="Leave a Public Message Here">
			</div><br>
			<div class="#">
				<button type="submit" name="post" class="post-btn">Post</button>
			</div>
			<div class="printed">
				<?php
					echo $msg;
				?>
			</div>
		</form>
	</div>
	<div class="nav-left">
		<img src="chill.jpg" width="120" height="120" class="pic">
		<div class="cred">
			<b>Comp:</b> 
			<span id="cred"><?php echo $fetch['comp']; ?></span>
		</div>
		<div class="cred">
			<b>School:</b> 
			<span id="cred"><?php echo $fetch['school']; ?></span>
		</div>
		<div class="cred">
			<b>Program:</b> 
			<span id="cred"><?php echo $fetch['program']; ?></span>
		</div>
		<div class="cred">
			<b>Username:</b> 
			<span id="cred"><?php echo $fetch['username']; ?></span>
		</div><hr>
		<form class="list" action="schools.php" method="post" enctype="multipart/form-data">
			<p>SCHOOLS</p>
			<ul>
				<li><button type="submit" name="mine" class="ul btn-success">Sch of Mining</button></li>
				<li><button type="submit" name="busi" class="ul btn-success">Sch of Business</button></li>
				<li><button type="submit" name="edu" class="ul btn-success">Sch of Education</button></li>
				<li><button type="submit" name="eng" class="ul btn-success">Sch of Engineering</button></li>
				<li><button type="submit" name="nat" class="ul btn-success">Sch of Natural Sciences</button></li>
				<li><button type="submit" name="vet" class="ul btn-success">Veterinary Medicine</button></li>
				<li><button type="submit" name="agric" class="ul btn-success">Agricultural Sciences</button></li>
				<li><button type="submit" name="human" class="ul btn-success">Humanities & Social Sciences</button></li>
			</ul>
		</form>
	</div>
</body>
</html>