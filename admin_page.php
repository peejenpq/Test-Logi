<?php 
session_start();
if($_SESSION['User_id'] == ""){
	echo "Please Login!";
	ext();
}
if($_SESSION['Status'] != "ADMIN"){
	echo "This page for Admin";
	exit();
}

mysql_connect("localhost","root","masterkey");
mysql_select_db("mydatabase");
$strSQL = "SELECT * FROM membaer WHERE UserID = '".$_SESSION['UserID']."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
?>

<html>
<head>
	<title>adminPage</title>
</head>
<body>
Welcome Admin<br>
<table border="1" style="width: 300px">
	<tbody>
		<tr>
			<td width="87">Username</td>
			<td width="197"><?php echo $objResult["Username"];?></td>
		</tr>
		<tr>
			<td> $nbsp;Name</td>
			<td><?php echo $objResult["Name"];?></td>
		</tr>
	</tbody>
</table>
<br>
<a href="edit_profile.php">Edit</a><br>
<br>
<a href="logout.php">Logout</a>
</body>
</html>