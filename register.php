<?php
	session_start();
	require_once'conn.php';

	if (isset($_POST["login"])) {
		$user = $_POST["user"];
		$passEntered = $_POST["password"];

		if (empty($user)) {
			header("location:index.php?login=empty");
			exit();
		} elseif (empty($passEntered)) {
			header("location:index.php?login=empty");
			exit();
		} else {
			$sql = "SELECT username FROM users WHERE username = '$user'";
			$found = mysqli_query($connect, $sql);
			$numRows = mysqli_num_rows($found);

			if ($numRows == 1) {
				$sql2 = "SELECT * FROM users WHERE username = '$user'";
				$outcome = mysqli_query($connect, $sql2);
				$stored = mysqli_fetch_array($outcome, MYSQLI_ASSOC);
				$retrievedPass = $stored["password"];
				
				if ($passEntered != $retrievedPass) {
					header("location:index.php?login=wrongpswd");
					exit();
				} else {
					session_start();
					$_SESSION["signedin"] = $user;
					header("location:home.php");
					exit();
				}
				
			} else {
				header("location:index.php?login=notfound");
				exit();
			}
		}
		mysqli_close($connect);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Unza online hub system</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="./awesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<style type="text/css">
.login_msg{
	position: fixed;
	margin-top: 80px;
}
.log{
	text-align: center;
	margin-bottom: 8px;
}
</style>
</head>

<body id="body" class="container-center">
	<header class="top">
		<a class="link" href="home.php"><i class="fas fa-home"></i></a>
		<a class="link" href="reg.php"><i class="fas fa-edit"></i></a>
	</header>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
		<div class="login_msg">
			<?php
				if (isset($_GET["login"])) {
					if ($_GET["login"]=="empty") {
						echo '<h6 class="wrong">Fill in both fields to login</h6>';
					}
					if ($_GET["login"]=="wrongpswd") {
						echo '<h6 class="wrong">Invalid password</h6>';
					}
					if ($_GET["login"]=="notfound") {
						echo '<h6 class="wrong">Invalid login</h6>';
					}
				}
			?>
		</div>
		<div class="reg">
			<input class="fields" type="text" name="user" placeholder="Username">
			<input class="fields" type="password" name="password" placeholder="Password">
	
			<div class="log">Already have an account?</div>
			<button type="submit" name="login" class="btn btn-success">Login</button><br><br>
			<div class="log">or</div>
			<div class="log"><a class="par" href="reg.php">Create Account</a></div>
		</div>
	</form>
</body>
</html>
