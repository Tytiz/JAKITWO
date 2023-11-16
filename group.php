<?php require_once('db.php'); ?>
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
				if (isset($_POST['submit'])) {
					// groupcode, groupname, remark, url should be inserted to USERGROUP table
					$mysqli = new mysqli('localhost', 'root', 'root', 'loginsystem');
					if ($mysqli->connect_errno) {
						echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
					}
					$groupcode = $_POST["groupcode"];
					$groupname = $_POST["groupname"];
					$remark = $_POST["remark"];
					$url = $_POST["url"];
					$q = "INSERT INTO user_group(USERGROUP_CODE, USERGROUP_NAME, USERGROUP_REMARK, USERGROUP_URL) VALUES('$groupcode','$groupname','$remark', '$url')";
					if (!$mysqli->query($q)) {
						echo "INSERT failed. Error: " . $mysqli->error;
					}

				}
				?>
				<h2>User Group</h2>
				<table>
					<col width="10%">
					<col width="20%">
					<col width="30%">
					<col width="30%">
					<col width="5%">
					<col width="5%">

					<tr>
						<th>Group Code</th>
						<th>Group Name</th>
						<th>Remark</th>
						<th>URL</th>
						<th>Edit</th>
						<th>Del</th>
					</tr>
					<?php
					$q = "select * from ADMINS";
					$result = $mysqli->query($q);
					if (!$result) {
						echo "Select failed. Error: " . $mysqli->error;
						return false;
					}
					while ($row = $result->fetch_array()) { ?>
						<tr>
							<td>
								<? echo $row['USERGROUP_CODE']; //add Group Code?>
							</td>
							<td>
								<? echo $row['USERGROUP_NAME']; //add Group Name?>
							</td>
							<td>
								<? echo $row['USERGROUP_REMARK']; //add Remark?>
							</td>
							<td>
								<? echo $row['USERGROUP_URL']; //add URL?>
							</td>
							<td><a href='edit_group.php?id=<? echo $row['USERGROUP_ID']; ?>'> <img src="images/Modify.png"
										width="24" height="24"></td>
							<td><a href='delinfo.php?id=<? echo $row['USERGROUP_ID']; ?>'> <img src="images/Delete.png"
										width="24" height="24"></a></td>
						</tr>
					<?php } ?>

					<?php
					// count the no. of entries
					$num_rows = mysqli_num_rows($result);
					echo "<tr>";
					echo "<td colspan='6' align='right'>Total " . $num_rows . " records.</td>";
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