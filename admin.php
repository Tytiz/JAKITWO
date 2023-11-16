<?php include 'db.php' //include connect.php here ?>
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
			<div id="div_content" class="usergroup">
				<!--%%%%% Main block %%%%-->
				<?php
				if (isset($_POST['sub'])) {
					// insert data from add_user.php
					$username = $_POST['username'];
					$tel = $_POST['tel'];
					$email = $_POST['email'];
					$passwd = $_POST['passwd'];
					$usergroup = $_POST['usergroup'];
					$q = "INSERT INTO ADMINS (username, tel, email, password) 
					VALUES ('$username','$tel','$email',,'$passwd')";
					$result = $mysqli->query($q);
					if (!$result) {
						echo "INSERT failed. Error: " . $mysqli->error; //what happens here
					}
				}
				?>
				<h2>User Profile</h2>
				<table>
					<col width="15%">
					<col width="30%">
					<col width="30%">
					<col width="20%">
					<col width="5%">

					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>User Group</th>
						<th>Disabled</th>
						<th>Edit</th>
						<th>Del</th>
					</tr>
					<?php
					$q = "select * from ADMINS,USER_GROUP where ADMINS.ID=USER_GROUP.USERGROUP_ID;
					$result = $mysqli->query($q);
					if (!$result) {
						echo "Select failed. Error: " . $mysqli->error;
						return false; // what happens here
					}
					while ($row = $result->fetch_array()) { ?>
						<tr>
							<td>
								<? echo $row['username']; //add USER_FNAME?>
								<? echo $row['tel']; //add USER_LNAME?> 
								
							</td>
							<td>
								<? echo $row['email']; //add USER_EMAIL?>
							</td>
							<td>
								<? echo $row['usergroup']; //add USERGROUP_NAME?>
							</td>
							<td><a href='edit_user.php?id=<?= $row['ID'] ?>'> <img src="images/Modify.png"
										width="24" height="24"></td>
							<td><a href='delinfo.php?id=<?= $row['ID'] ?>'> <img src="images/Delete.png" width="24"
										height="24"></a></td>
						</tr>
					<?php } ?>

					<?php
					// count the no. of entries
					$num_rows = mysqli_num_rows($result);
					echo "<tr>";
					echo "<td colspan='7' align='right'>Total " . $num_rows . " records.</td>";
					echo "</tr>";
					?>
				</table>
			</div> <!-- end div_content -->

		</div> <!-- end div_main -->

		<div id="div_footer">

		</div>

	</div>
</body>

</html>