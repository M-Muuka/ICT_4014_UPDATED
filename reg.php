<?php
	session_start();
	require_once 'conn.php';

	if (isset($_POST['signup'])) {
		$first = $_POST['first'];
		$last = $_POST['last'];
		$names = $first." ".$last;
		$username = $_POST['username'];
		$comp = $_POST['comp'];
		$school = strtolower($_POST['school']);
		$prog = $_POST['program'];
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		$password = $pass2;
		
		if (empty($first)) {
			header("location:reg.php?val=empty");
			exit();
		} elseif (empty($last)) {
			header("location:reg.php?val=empty");
			exit();
		} elseif (empty($username)) {
			header("location:reg.php?val=empty");
			exit();
		} elseif (empty($comp)) {
			header("location:reg.php?val=empty");
			exit();
		} elseif (empty($school)) {
			header("location:reg.php?val=empty");
			exit();
		} elseif (empty($prog)) {
			header("location:reg.php?val=empty");
			exit();
		} elseif (empty($pass1)) {
			header("location:reg.php?val=empty");
			exit();
		} elseif (empty($pass2)) {
			header("location:reg.php?val=empty");
			exit();
		} elseif ($pass1 != $pass2) {
			header("location:reg.php?val=mismatch");
			exit();
		} else {

			$find = "SELECT username FROM users WHERE username = '$username'";
			$keep = mysqli_query($connect, $find);
			$numRows = mysqli_num_rows($keep);

			if ($numRows > 0) {
				header("location:reg.php?val=taken");
				exit();
			} else {
				$sql = "INSERT INTO users(username, names, comp, school, program, password, pic) 
				VALUEs('$username', '$names','$comp','$school','$prog','$password','$pic')";
				$query = mysqli_query($connect, $sql);
				
				if (!$query) {
					header("location:reg.php?val=notsent");
					exit();
				} else {
					header("location:reg.php?val=sent");
					exit();
				}
			}
		}	
	}
	mysqli_close($connect)
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="./awesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<style type="text/css">
.guide{
	text-align: center;
}
.reg-info{
	text-align: center;
	font-size: 20px;
}
.field_label{
	width:40%;
	height:35px;
	margin-left: 43px;
	margin-top: 20px;
	margin-bottom: 20px;
	padding-left:15px;
}
</style>

</head>
<body id="body" class="container-center">
	<header class="top">
		<a class="link" href="home.php"><i class="fas fa-home"></i></a>
		<div class="right">
			<a class="link" href="faqs.php">FAQs</a>
			<a class="link" href="index.php">Login</a>
		</div>
	</header>
	<div class="reg">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
			<div class="reg-info">
				<p>Provide your Details to get Registered</p>
			</div>
			<div class="guide">
				<?php
					if (isset($_GET['val'])) {
						if ($_GET['val']=="empty") {
							echo '<h6 class="wrong">Please fill in all the fields below</h6>';
						}
						if ($_GET['val']=="mismatch") {
							echo '<h6 class="wrong">Password and confirm password do not match</h6>';
						}
						if ($_GET['val']=="taken") {
							echo '<h6 class="wrong">Sorry, that username is already taken.</h6>';
						}
						if ($_GET['val']=="notsent") {
							echo '<h6 class="wrong">Error submitting information. Try again</h6>';
						}
						if ($_GET['val']=="sent") {
							echo '<h6 class="msg">Congratulations, you are now registered</h6>';
						}
					}
				?>
			</div>
			<input class="fields" type="text" name="first" placeholder="First Name">
			<input class="fields" type="text" name="last" placeholder="Second Name"><br>
			<input class="fields" type="text" name="username" placeholder="Username.. (E.g: Simson@Unza)">
			<select class="fields" type="text" name="school">
				<option value="" disabled selected>School of Admission/Interest</option>
				<option>School of Education</option>
				<option>Humanities & Social Sciences</option>
				<option>School of Natural Sciences</option>
				<option>School of Engineering</option>
				<option>School of Mining</option>
				<option>School of Veterinary Medicine</option>
				<option>School of Agricutural Sciences</option>
			</select>
			<input class="fields" type="text" name="program" placeholder="Programme of Study/Interest">
			<input class="fields" type="text" name="comp" placeholder="Computer No -- (For Students Only)">
			<input class="fields" type="password" name="pass1" placeholder="Password">
			<input class="fields" type="password" name="pass2" placeholder="Confirm Password">
			<label class="field_label"> Upload your profile picture here →</label>
			<input class="fields" type="file" name="pic" placeholder="Confirm Password">
			<hr>
			<button type="submit" name="signup" class="btn btn-success">Signup</button>
		</form>
	</div>
</body>
</html>