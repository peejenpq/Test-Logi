<?php
session_start();
if($_SESSION['UserID'] == ""){
	echo "Please Login!";
	exit();
}
mysql_connect("localhost","root","masterkey");
mysql_select_db("mydatabase");
$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."'";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<form name="form1" method="post" action="save_profile.php">
	Edit Profile! <br>
	<table width="400" border="1" style="widows: 400px">
		<tr>
			<td width="125"> UserID</td>
			<td width="180"><?php echo $objResult["UserID"];?></td>
		</tr>
		<tr>
			<td width="125">Username</td>
			<td><?php echo $objResult["Username"]?></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="Password" name="txtPassword" id="txtPassword" value="<?php echo $objResult["Password"];?>"></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" name="txtConPassword" id="txtConPassword" value="<?php echo $objResult["Password"];?>"></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="txtName" value="<?php echo $objResult["Name"];?>"></td>
		</tr>
		<tr>
			<td>Status</td>
			<td><?php echo $objResult["Status"];?></td>
		</tr>
	</table>
	<br>
	<input type="submit" name="Submit" value="Save">
</form>

</body>
</html>