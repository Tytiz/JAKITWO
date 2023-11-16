<?php
	$id = $_GET['id'];
	
	require_once('db.php');
	if (isset($id)) {
		$q="DELETE FROM ADMINS where ID=$id";
			if(!$mysqli->query($q)){
				echo "DELETE failed. Error: ".$mysqli->error ;
		   }
		   $mysqli->close();
		   //redirect
		   header("Location: group.php");
		}
?>
