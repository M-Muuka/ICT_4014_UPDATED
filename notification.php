<?php
	//require 'config.php';
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
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
		<div class="notif">	
			<table class="table">
				<tbody>
					<tr>
						<?php while ($record = mysqli_fetch_assoc($rows)): ?>

						<th><?php echo $record["appId"]; ?></th>
						<td><?php echo $record["username"]; ?></td>
						<th> <a href="display_with.php?withId=<?php echo $record["appId"];?>" class=" btn-sm btn-success">View</a> </th>
						<td><a href="delete.php?withMsg=<?php echo $record["appId"];?>" class=" btn-sm btn-danger">Delete</a></td>
					</tr>
						<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</form>
</body>
</html>