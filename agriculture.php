<?php
	session_start();
	require_once('conn.php');

	$school = "agriculture";
	$sql = "SELECT * FROM users WHERE school = '$school'";
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
	position: absolute;
	width: 75vw;
	margin-top: 180px; 
	margin-left: 320px;
	border-radius: 5px;
	padding: 10px;
	font-weight: normal; 
}
.notif{				/*post button*/
	position: fixed;
	font-weight: bolder;
	text-align: right;
	color: darkgreen;
	width: 75vw;
	margin-top: 135px; 
	margin-left: 320px;
	padding: 10px;
	z-index: 1;
}
.ed_msg{
	position: fixed;
	margin-top: 94px;
	width: 100vw;
	text-align: center;
	border-top: 2px solid green;
	border-bottom: 2px solid green;
	background-color: white;
	z-index: 1;
}
#try1{
	position: fixed;
	margin-top: 94px;
	width: 10vw;
	text-align: center;
	border-top: 2px solid green;
	border-bottom: 2px solid green;
	z-index: 1;
}
.nav-left{				/*aside navigation*/
	position: absolute;
	width: 20vw;
	margin-top: 135px; 
	margin-left: 0.2vw;
	border: 1px solid #ccc;
	border-radius: 5px;
	padding: 10px;
	font-weight: normal;
}
.ed{
	position: fixed;
	margin-top: 44.5px;
	width: 100vw;
	padding: 5px;
	text-align: center;
	border-top: 2px solid green;
	z-index: 1;
	background-color:white;
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
		<div class="ed"><h3>SCHOOL OF AGRICULTURAL SCIENCES</h3></div>
		<form action="home.php" method="post" enctype="multipart/form-data">
			<div>
				<input type="text" name="message" class="ed_msg" placeholder="Write Something in this Field" autocomplete="off">
				<input type="submit" name="post" id="try1" value="POST" class="btn-success">
			</div>
			<span class="notif">NOTIFICATIONS</span>
			<div class="printed">
				<table class="table">
					<tbody>
						<tr>
							<?php while ($fetch = mysqli_fetch_assoc($set)): ?>

								<td><a href="chat.php?id=<?php echo $fetch["userID"];?>"><?php echo $fetch["username"].": ".$fetch["school"];?></td></a>
						</tr>
							<?php endwhile; ?>
					</tbody>
				</table>
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
			<p><b>SCHOOLS OF ADMISSION:</b></p><hr>
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