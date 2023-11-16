<?php
require_once('db.php');

if (isset($_POST['sub'])) {
	// Extra all data from POST
	$adminid = $_POST['adminid'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$passwd = $_POST['passwd'];
	$usergroup = $_POST['usergroup'];
	if (isset($_POST['disabled'])) {
		$disabled = $_POST["disabled"];
	} else {
		$disabled = 0;
	}

	$q = "UPDATE ADMINS SET EMAIL='$email',USERNAME='$username',
	PASSWORD='$passwd' where ID='$adminid'";

	$result = $mysqli->query($q);
	if (!$result) {
		echo "Update failed. Error: " . $mysqli->error;
		return false;
	}
	header("Location: admin.php");
}

?>
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


				<h2>Edit User Profile</h2>
				<?php
				$userid = $_GET['userid'];
				$q = "SELECT * FROM ADMIND where ID = $adminid";
				$result = $mysqli->query($q);
				echo "<form action='edit_user.php' method='post'>";

					echo "<label>First name</label>";
					echo "<input type='text' name='firstname' value=" . $row['ADMIN_FNAME'] . ">";

					echo "<label>Last name</label>";
					echo "<input type='text' name='lastname' value=" . $row['ADMIN_LNAME'] . ">";
					echo "<div>";
					echo "</div>";


					echo "<label>Email</label>";
					echo "<input type='text' name='email' value=" . $row['ADMIN_EMAIL'] . ">";

					echo "<h2> Account Profile</h2>";

					echo "<label>Username</label>";
					echo "<input type='text' name='username' value='" . $row['ADMIN_NAME'] . "'>";

					echo "<label>Password</label>";
					echo "<input type='password' name='passwd' value=" . $row['ADMIN_PASSWD'] . ">";

					echo "<label>Confirmed password</label>";
					echo "<input type='password' name='cpasswd'>";

					echo "<label>User group</label>";
					echo "<select name='usergroup'>";

					$q3 = 'select USERGROUP_ID, USERGROUP_NAME from USERGROUP;';
					if ($result3 = $mysqli->query($q3)) {
						while ($row3 = $result3->fetch_array()) {
							echo "<option value= $row3[0] ";
							if ($row3[0] == $row['USER_GROUPID'])
								echo "SELECTED";
							echo "> $row3[1] </option>";
						}
					} else {
						echo 'Query error: ' . $mysqli->error;
					}

					echo "</select>";
					echo "<label>Disabled</label>";



					echo "<input ";
					if ($row['DISABLE'] == 1)
						echo "CHECKED='CHECKED'";
					echo "type='checkbox' name='disabled' >";



					echo "<input type='hidden' name='userid' value=" . $row['USER_ID'] . " >";
					echo "<div class='center'>";
					echo "<input type='submit' name='sub' value='Submit'>";
					echo "</div>";
				}
				?>
				</form>
			</div> <!-- end div_content -->

		</div> <!-- end div_main -->

		<div id="div_footer">

		</div>

	</div>
</body>

</html>