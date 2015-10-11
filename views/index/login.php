<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
</head>
<body>
	<form method="POST">
		<table>
			<tr>
				<td align="right"><b>Input Username : </b></td>
				<td><input type="text" name="username" placeholder="Please Input Username"></td>
			</tr>
			<tr>
				<td align="right"><b>Input Password : </b></td>
				<td><input type="text" name="password" placeholder="Please Input Password"><br></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Login"></td>
			</tr>
		</table>
	</form>
	<?php
		if(isset($_POST['submit'])){
			echo "<hr>";
			$user = $_POST['username'];
			$pass = $_POST['password'];
			if($user == $username && $pass == $password){
				echo "<h3>Login Success. <small>Username = '$username', Password = '$password'</small></h3>";
			}else{
				echo "<h3>Login Fail.</h3>";
			}
		}
	?>
</body>
</html>