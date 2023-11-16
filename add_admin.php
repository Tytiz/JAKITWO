<?php include 'db.php' //include connect.php here  ?>
<!DOCTYPE html>
<html>

<head>
	<title>ADMIN SYSTEM</title>
	<link rel="stylesheet" href="default.css">
</head>

<body>
	

	<div id="wrapper">
		<?php include 'header.php'; ?>
		<div id="div_main">
			<div id="div_left">
				

			</div>
			<div id="div_content" class="form">
				<!--%%%%% Main block %%%%-->
				<!--Form -->
				

				<form action="admin.php" method="post">
					
					<div>
					</div>

					

					<h2> Account Profile</h2>
					<label>Username</label>
					<input type="text" name="username">

					<label>Tel</label>
					<input type="text" name="tel">

					
					<label>Email</label>
					<input type="text" name="email">

					<label>Password</label>
					<input type="password" name="passwd">

					<label>Confirmed password</label>
					<input type="password" name="cpasswd">

					<label>User group</label>
                	<select name="usergroup">
					<option value="admin">Admin</option>
					</select>
					<?php
					if ($_REQUEST['usergroup']=='admin') {
            		$query    = "INSERT into `admins` (username, tel, password, email, create_datetime)
                     VALUES ('$username','$tel', '" . md5($password) . "', '$email', '$create_datetime')";
            		$result   = mysqli_query($con, $query);
					}
					?>

					

					
					<div class="center">
					<input type="submit" name="submit" value="Submit" class="login-button">
					</div>
				</form>
			</div> <!-- end div_content -->

		</div> <!-- end div_main -->

		<div id="div_footer">

		</div>

	</div>
</body>

</html>