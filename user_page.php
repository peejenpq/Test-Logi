<?php
session_start();
if($_SESSION['UserID'] == ""){
	echo "Please Login!";
	exit();
}
if($_SESSION['Status'] != "USER"){
	echo "This page for User";
	exit();
}
mysql_connect("localhost","root","masterkey");
mysql_select_db("mydatabase");
$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION["UserID"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Page</title>
</head>
<body>

Welcome User
<table border="1" style="width: 300px">
	<tbody>
		<tr>
			<td width="87">Username</td>
			<td width="197"><?php echo $objResult["Username"];?></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><?php echo $objResult["Name"]?></td>
		</tr>
	</tbody>
</table>
<br>
<a href="edit_profile.php">Edit</a>
<br>
<br>
<a href="logout.php">Logout</a>
</body>
</html>